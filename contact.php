<?php 
include "include/header.php";
?>
<style>
  select {width: 20em;}
</style>
    <section class="banner-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="info-box">
                        <h2><i>Contact Us</i></h2>
                    </div>

                    <div class="info-box"> 
                        <p>If you are interested in funding or learning more about the work of Ecosymbionts Regenerate (ER) and/or Ecosymbionts Regenerate Together (ERT) or if you would like to submit Creative-Work, please contact us.</p>
                    </div>

                    <div class="info-contact_form">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Full name*</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputPassword1">Email address*</label>
                                    <input type="test" class="form-control" id="">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-check-label" for="exampleCheck1">Country of residence*</label>
                                <input type="test" class="form-control" id=""> 
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-check-label" for="exampleCheck1">Subject*</label>
                                <select class="form-control" name="field1" id="field1" multiple onchange="console.log(Array.from(this.selectedOptions).map(x=>x.value??x.text))" multiselect-hide-x="true">
                                    <option value="1">I am interested in fuding the work of ER and/or ERT</option>
                                    <option value="2">I am interested in learning more about the work of ER and/or ERT</option>
                                    <option value="3">I am interested in submitting Creative-Work to ERT</option>
                                </select> 
                            </div>
                            <div class="form-group ">
                                <label for="exampleCheck1">Message (up to 250 words)*</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>                               
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php 
include "include/footer.php"
?>