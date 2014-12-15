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

            <h1 class="page-title">Categorie toevoegen</h1>

            <div class="contact-form-container">
                <?php
                    $data = array(
                        'id' => 'addCategoryForm'
                    );
                    echo form_open('', $data);
                ?>
                <div class="form-title">
                    <div class="error">test</div>
                    <div class="success">Het product is toegevoegd!
                    </div>
                </div>
                <ul class="form-fields">
                    <li class="left">
                        <label for='name'>Naam</label>

                        <p>
                            <input type='text' name='name' id="name">
                        </p>
                    </li>
                    <li class="left">
                        <label for='description'>Beschrijving</label>

                        <P>
                            <input type='text' name='description' id="description">
                        </p>
                    </li>
                </ul>
                <ul class="form-fields">
                    <li class="left">
                        <p>Is de nieuwe categorie een subcategorie?</p>
                    </li>
                    <li class="left">
                        <p>
                            <input type="radio" name="sub" value="1" id="yes" style="width: 15px; height: 15px">
                            <label for="yes" style="position: absolute">Ja</label>
                            <br>
                            <input type="radio" name="sub" value="0" id="no" style="width: 15px; height: 15px" checked>
                            <label for="no" style="position: absolute">Nee</label>
                        </p>
                    </li>
                </ul>
                <ul class="form-fields" id="subcat">
                    <li class="left" style="display: none">
                        <label for='description'>Selecteer categorie</label>

                        <p>
                            <select>
                                <?php
                                    foreach($categories as $category)
                                        print('<option value="' . $category->id .  '">' . $category->titel .  '</option>');
                                ?>
                            </select>
                        </p>
                    </li>
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
    var subcat = 0;
    $('input[type="radio"]').on('change', function() {
        if (this.value == 1) {
            $('#subcat > li').show(300);
            subcat = 1;
        } else if (this.value == 0) {
            $('#subcat > li').hide(300);
            subcat = 0;
        }
    });

    function checkEmpty(field) {
        var fieldVal = $("#" + field).val();
        if (fieldVal == null || fieldVal == "") {
            return false;
        }
        return true;
    }

    $("#addCategoryForm").submit(function (event) {
        event.preventDefault();

        $(".error").html("");

        var name = checkEmpty('name');
        var description = checkEmpty('description');

        if (!name || !description) {
            if (!name) {
                $(".error").append("U hebt geen categorie naam ingevuld <br />");
            }
            if (!description) {
                $(".error").append("U hebt geen beschrijving ingevuld <br />");
            }
            $(".error").show(300);
        } else {
            var cat = 0
            if (subcat > 0) {
                cat = $('select').val();
            } else {
                cat = 0;
            }
            console.log(cat);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>settings/addcategorypost',
                data: {
                    name: $("#name").val(),
                    description: $("#description").val(),
                    parent: cat
                },
                success: function (resp) {
                    console.log(resp)
                    if (resp == 1) {
                        document.getElementById("addCategoryForm").reset();
                        $('.success').show(300);
                        $('#subcat > li').hide(300);
                    }
                }
            });
        }
    });
</script>