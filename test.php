<?php

class maha{

}

echo __METHOD__ ;
echo __FUNCTION__ ;
echo __DIR__ ;
echo  __FILE__ .'<br>';
echo maha::class ;

?>



<body>
    <div class="container">
        <div class="form-row">
            <div class="d-flex justify-content-center align-items-center container">
                <form action="" method="post" class="border border-success">
                    <div class="col-sm-10 offset-sm-1">
                        <div class="col-12 text-center text-dark"><br>
                            <h3>Review </h3><br>
                        </div>
                        <div class="form-group">
                            <label for="num1">Question</label><br>
                            <?php foreach ($rates as $rate => $score) { ?>
                                <label for="$rate"> <?php echo $rate; ?> </label> <?php } ?> <br>
                        </div>
                        <?php foreach ($questions as $key => $quest) { ?>
                            <div class="form-group">
                                <label for="quest"> <?php echo $quest; ?> </label>
                                <?php for ($x = 1; $x <= count($rates); $x++) { ?>
                                    <input type="radio" class="form-check-input" value="<?php echo "value". $x ?>" name="<?php "value" . (++$key) ?>">
                                    <?php for ($space = 0; $space < 10; $space++) { ?> &nbsp; <?php } ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <button type="submit" class="btn btn-success ">Calculate</button><br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>




