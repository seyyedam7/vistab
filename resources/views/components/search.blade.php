<div class="row">
    <div class="col-lg-12">
        <section class="panel panel-primary">
            <header class="panel-heading">
                Search and restrict results
            </header>
            <div class="panel-body">
                <form class="form-horizontal tasi-form" method="GET" action="">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">The phrase to search</label>
                        <div class="col-sm-4">
                            <input name="q" type="text" class="form-control" value="<?php echo $q;?>">
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-success">search</button>
                            &nbsp;&nbsp;<a href='{{$redirect}}'>Delete Search Filter</a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
