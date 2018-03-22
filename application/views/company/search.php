
<div class="banner">
    <div class="banner-top">



        <form class="form-inline" method="get" action="<?=base_url()?>index.php/home/company">
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">

                <input type="text" class="form-control input-lg" id="inlineFormInputGroup" placeholder="Search Everything in Ikota Shopping Complex" name="search" type="search">
                <div class="input-group-addon" style="background-color: violet !important;">
                    <button style="background-color: violet !important; border: none !important; color: #fff !important;" type="submit"><i class="fa fa-search fa-2x"></i></button>
                </div>
            </div>


        </form>

    </div>
    <div class="now">

        <div class="clearfix"> </div>
    </div>
</div>
<div class="clearfix"> </div>
</div>

<div class="container">



    <?php
    if($artisanFound ==NULL){;
        ?>

        <div class="row alert alert-danger">
            <div class="col-md-12" id="search">
                <div class="">
                    <h1 class="text-danger text-center">Oops! We don't have any data for <?=$_GET['search']?></h1>
                </div>

            </div>
        </div>


        <?php
    }else{; ?>

        <?php
        $itemFound = count($artisanFound);
        echo '<div class="row alert alert-success">
                        <div class="col-md-12" id="search">
                            <div class="">
                                <h1 class="text-center">' .$itemFound . ' Item(s) found for '.$_GET['search']. '</h1>
                            </div>

                        </div>
                    </div>';



        ?>
        <?php
        foreach ($artisanFound  as $item):
            ?>

            <div class="row" style="margin-bottom: 30px !important;">
                <div class="col-md-12" id="search" style="background-color: #eeeeee">
                    <div class="col-md-4">
                        <?php
                        foreach($logo as $mylogo):

                            if(!$mylogo==NULL){
                                ?>
                                <img src="<?=base_url()?>assets/uploads/profile/<?=$mylogo['Logo'];?>" class="img-rounded" height="150"
                                     style="margin: 5px !important;">

                                <?php
                            }else { ?>
                                <img src="<?=base_url()?>assets/uploads/profile/defaultlogo.png" class="img-rounded" height="150"
                                     style="margin: 5px !important;">


                                <?php
                            }
                        endforeach;
                        ?>




                    </div>

                    <div class="col-md-8">
                        <h2 class="text-success"><?= $item->CompanyName; ?></h2>
                        <h4 class="">Email: <?= $item->Email; ?></h4>
                        <h4 class="">Phone: <?= $item->Phone; ?></h4>


                        <div>
                            <a href="<?= base_url() ?>index.php/Home/companydetails/<?= $item->Id; ?>"
                               class="btn btn-success">View Details</a>
                            <a href="#" id="showmes" class="btn btn-primary">Send Company Message</a>
                            <!--<a href="#" class="btn btn-info"><i class="fa fa-thumbs-up"></i>Recommend</a>-->

                            <div id="mes">
                                <form method="post">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="sname" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea name="message" class="form-control" cols="14" rows="5" ></textarea>
                                    </div>

                                    <div class="form-group">

                                        <input type="submit" name="sname" class="btn btn-primary" value="Send">

                                    </div>
                                </form>
                            </div>

                            <script type="text/javascript">
                                var companyId = <?= $item->Id; ?>;
                                $("#mes").hide();

                                   /* $("#showmes").click(){
                                        $("#mes").show();
                                }*/
                            </script>

                        </div>
                        <hr>
                    </div>
                </div>
            </div>

            <hr class="tall">

            <?php
        endforeach;
        ?>

        <?php
    }
    ?>









</div>



<hr class="tall">