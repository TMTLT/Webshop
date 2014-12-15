<!--Content Block-->
<section class="content-wrapper">
    <div class="content-container container">
        <div class="col-left">
            <div class="block man-block">
                <div class="block-title">Opties</div>
                <ul>
                    <li><a href="/settings/addproduct" title="">Producten toevoegen</a></li>
                    <li><a href="/settings/addcategory" title="">Categorie toevoegen</a></li>
                </ul>
            </div>
        </div>
        <div class="col-main">

            <h1 class="page-title">Product toevoegen</h1>

            <div class="contact-form-container">
                <?php
                    $data = array(
                        'id' => 'addProductsForm'
                    );
                    echo form_open_multipart('', $data);
                ?>
                <div class="form-title">
                    <div class="error">test</div>
                    <div class="success">Het product is toegevoegd!
                    </div>
                </div>
                <ul class="form-fields">
                    <li class="left">
                        <label for='name'>Product naam</label>

                        <p>
                            <input type='text' name='name' id="name">
                        </p>
                    </li>
                    <li class="left">
                        <label for='price'>Prijs</label>

                        <P>
                            <input type='text' name='price' id="price">
                        </p>
                    </li>
                    <li class="left">
                        <label>Categorie</label>


                        <select>
                            <?php
                                print_r($categories);
                                foreach($categories as $category)
                                    print('<option value="' . $category->id .  '">' . $category->titel .  '</option>');
                            ?>
                        </select>
                    </li>
                    <li class="full-row">
                        <p>
                            <label for='description'>Beschrijving</label>

                        <p>
                            <textarea name='description' id="description"></textarea>
                        </p>
                    </li>

                    <div class="button-set">
                    </div>

                    <input type="hidden" id="x1" name="x1"/>
                    <input type="hidden" id="y1" name="y1"/>
                    <input type="hidden" id="x2" name="x2"/>
                    <input type="hidden" id="y2" name="y2"/>
                    <input type="hidden" id="w" name="w">
                    <input type="hidden" id="h" name="h">

                    <h1 class="page-title" id="title2">Product foto</h1>

                    <li class="left">
                        <p>
                            <input id="uploadFile" placeholder="Choose File" disabled/>

                        <div class="fileUpload">
                            <input value='Uploaden' class="form-button"
                                   style="width: 80px; position: absolute; margin-top: -57px; margin-left: 270px; height: 37px; text-align: center"/>
                            <input type="file" class="upload" name="image_file" id="image_file"
                                   onchange="fileSelectHandler()"
                                   style="width: 80px; position: absolute; margin-top: -57px; margin-left: 270px; height: 37px;"/>
                        </div>
                        <img id="waiting" src="/images/loading.gif" style="display: none;"/>

                        </p>
                    </li>

                    <div class="step2" style="display: none; margin-top: 100px">

                        <li class="full-row">
                            <img id="preview"/>
                        </li>

                    </div>

                    <div class="button-set">
                        <input type='submit' name='submit' value='Toevoegen' class="form-button"/>
                    </div>
                </ul>
                </form>

            </div>
            <div class="clearfix"></div>
        </div>
</section>
</div>

<script>
    function validatePrice() {
        var email = $("#price").val();
        var regex = /^([1-9][0-9]*|0)(\,[0-9]{2})?$/;

        return regex.test(email);
    }

    function checkEmpty(field) {
        var fieldVal = $("#" + field).val();
        if (fieldVal == null || fieldVal == "") {
            return false;
        }
        return true;
    }

    function bytesToSize(bytes) {
        var sizes = ['Bytes', 'KB', 'MB'];
        if (bytes == 0) return 'n/a';
        var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
        return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
    }
    ;

    function updateInfo(e) {
        $('#x1').val(e.x);
        $('#y1').val(e.y);
        $('#x2').val(e.x2);
        $('#y2').val(e.y2);
        $('#w').val(e.w);
        $('#h').val(e.h);
    }
    ;

    var jcrop_api, boundx, boundy;

    function fileSelectHandler() {
        $('#uploadFile').val($('#image_file').val());
        $('.step2').hide(300);
        $('.fileUpload').hide(300);
        $('#uploadFile').hide(300);
        $('#waiting').show(300);
        $('#title2').html('Product foto bijsnijden');
        var oFile = $('#image_file')[0].files[0];

        $('.error').hide();

        var rFilter = /^(image\/jpeg|image\/png)$/i;
        if (!rFilter.test(oFile.type)) {
            $('.error').html('U hebt geen p;aatje geselecteerd').show();
            return;
        }

        var oImage = document.getElementById('preview');

        var oReader = new FileReader();
        oReader.onload = function (e) {
            oImage.src = e.target.result;
            oImage.onload = function () {
                var sResultFileSize = bytesToSize(oFile.size);
                $('#filesize').val(sResultFileSize);
                $('#filetype').val(oFile.type);
                $('#filedim').val(oImage.naturalWidth + ' x ' + oImage.naturalHeight);

                if (typeof jcrop_api != 'undefined') {
                    jcrop_api.destroy();
                    jcrop_api = null;
                    $('#preview').width(oImage.naturalWidth);
                    $('#preview').height(oImage.naturalHeight);
                }

                setTimeout(function () {
                    $('#preview').Jcrop({
                        minSize: [70, 70],
                        setSelect: [0, 0, 70, 70],
                        aspectRatio: 1,
                        boxWidth: 745,
                        boxHeight: 500,
                        bgFade: true,
                        bgOpacity: .6,
                        onChange: updateInfo,
                        onSelect: updateInfo
                    }, function () {

                        var bounds = this.getBounds();
                        boundx = bounds[0];
                        boundy = bounds[1];

                        jcrop_api = this;
                    });

                    $('.step2').show(300);
                    $('.fileUpload').show(300);
                    $('#uploadFile').show(300);
                    $('#waiting').hide(300);
                }, 1500);
            };
        };

        oReader.readAsDataURL(oFile);
    }

    function progressHandlingFunction(e) {
        /*if(e.lengthComputable){
         $('progress').attr({value:e.loaded,max:e.total});
         }*/
        console.log(e.loaded);
    }

    $("#addProductsForm").submit(function (event) {
        event.preventDefault();

        $(".error").html("");

        var name = checkEmpty('name');
        var priceval = checkEmpty('price');
        var description = checkEmpty('description');
        var price = validatePrice();

        if (!name || !priceval || !description || !price) {
            if (!name) {
                $(".error").append("U hebt geen product naam ingevuld <br />");
            }
            if (!priceval) {
                $(".error").append("U hebt geen prijs ingevuld <br />");
            }
            if (priceval && !price) {
                $(".error").append("U hebt geen geldige prijs ingevuld <br />");
            }
            if (!description) {
                $(".error").append("U hebt geen beschrijving ingevuld <br />");
            }
            $(".error").show(300);
        } else {
            var formData = new FormData($('form')[0]);
            formData.append('image', $('#image_file')[0].files[0]);

            $.ajax({
                type: 'POST',
                xhr: function () {
                    var myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload) {
                        myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
                    }
                    return myXhr;
                },
                url: '<?php echo base_url(); ?>settings/addproductpost',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (resp) {
                    if (resp == 1) {
                        document.getElementById("addProductsForm").reset();
                        $('.step2').hide(300);
                        $('.success').show(300);
                    }
                }
            });
        }
    });
</script>