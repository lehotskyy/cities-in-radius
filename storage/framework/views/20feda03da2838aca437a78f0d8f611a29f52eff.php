<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .container{
            margin-top:50px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <fieldset>
            <legend>Settings:</legend>
            <form action="">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="place">Place:</label>
                        <select name="city" class="form-control" id="place">
                            <?php $__currentLoopData = $availableCities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $availableCity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($availableCity->id); ?>"><?php echo e($availableCity->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="myRange">Range:</label>
                        <input name="radius" type="range" min="50" max="5000" value="<?php echo e($radius); ?>" class="slider" id="myRange">
                        <div ><span id="range"></span>km</div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Run</button>
                    </div>
                </div>
            </form>

        </fieldset>

    </div>
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>Results:</legend>
                <?php $__currentLoopData = $citiesInRadius; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cityInRadius): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($cityInRadius->name); ?> <?php echo e($cityInRadius->distance); ?> km</p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </fieldset>
        </div>
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("range");
    output.innerHTML = slider.value;


    slider.oninput = function() {
        output.innerHTML = this.value;
    }
</script>
</body>
</html>
<?php /**PATH /home/vagrant/code/sasha/resources/views/index.blade.php ENDPATH**/ ?>