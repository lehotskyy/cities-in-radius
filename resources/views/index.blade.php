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
                            @foreach($availableCities as $availableCity)
                                <option value="{{ $availableCity->id }}">{{ $availableCity->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="myRange">Range:</label>
                        <input name="radius" type="range" min="50" max="5000" value="{{ $radius }}" class="slider" id="myRange">
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
                @foreach($citiesInRadius as $cityInRadius)
                    <p>{{ $cityInRadius->name }} {{ $cityInRadius->distance }} km</p>
                @endforeach
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
