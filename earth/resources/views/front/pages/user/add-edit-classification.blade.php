<!-- block content -->
    <div class="block-content">
        <!-- single-post box -->
        <div class="row">
            <div class="col-xl-12">
                @if(session('success_message'))
                    <div class="alert alert-success bg-success text-dark border-0 alert-dismissible show autohide" role="alert">
                        {{ session('success_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                @if(session('error_message'))
                    <div class="alert alert-danger bg-danger text-dark border-0 alert-dismissible show autohide" role="alert">
                        {{ session('error_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
            </div>
            <?php
            if($row){
                $name = $row->name;
            } else {
                $name = '';
            }
            ?>
            <div class="col-md-12">
                <div class="card">
                <h3>Form: Author Classification</h3>
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="row" style="margin-bottom: 15px;">
                              <label for="name" class="col-md-4 col-lg-3 col-form-label">Are You?</label>
                              <div class="col-md-8 col-lg-9">
                                <input type="radio" id="Human individual" name="name" value="Human individual" <?=(($name == 'Human individual')?'checked':'')?> required>
                                <label for="Human individual">Human individual</label>
                                <input type="radio" id="Ecoweb-rooted community" name="name" value="Ecoweb-rooted community" <?=(($name == 'Ecoweb-rooted community')?'checked':'')?> required>
                                <label for="Ecoweb-rooted community">Ecoweb-rooted community</label>
                                <input type="radio" id="Movement" name="name" value="Movement" <?=(($name == 'Movement')?'checked':'')?> required>
                                <label for="Movement">Movement</label>
                              </div>
                            </div>
                            <div class="text-center">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End single-post box -->
    </div>
<!-- End block content -->