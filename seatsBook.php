<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <style>
            .disable{
                background-color: #AFE1AF;
            }
        </style>

</head>

<body>
    <h1>Hello, world!</h1>

    <div class="container">
        <div class="row">
            <!-- <form id="he"> -->
            <div class="col-12">
                <input type="text" class='form-control' id="name" placeholder="Enter your Name">
            </div>
            <button class='btn btn-success col-1 m-3 seatBtn'>1</button>
            <button class='btn btn-success col-1 m-3 seatBtn'>2</button>
            <button class='btn btn-success col-1 m-3 seatBtn'>3</button>
            <button class='btn btn-success col-1 m-3 seatBtn'>4</button>
            <button class='btn btn-success col-1 m-3 seatBtn'>5</button>
            <button class='btn btn-success col-1 m-3 seatBtn'>6</button>
            <button class='btn btn-success col-1 m-3 seatBtn'>7</button>
            <button class='btn btn-success col-1 m-3 seatBtn'>8</button>
            <button class='btn btn-success col-1 m-3 seatBtn'>9</button>
            <button class='btn btn-success col-1 m-3 seatBtn'>10</button>
            <div class="col-12">
                <input type="submit" class='btn btn-primary' id="submit" value='Submit'>
            </div>
            <!-- </form> -->
          
        </div>
        <div id="result"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {

            let seatArray = [];
            $('.seatBtn').click(function () {
                const buttonValue = this.innerHTML;

                console.log([...this.classList].includes('disable'));
                // Check if the button is already disabled
                if ([...this.classList].includes('disable')) {
                    // Remove the button value from the array
                    seatArray = seatArray.filter(value => value !== buttonValue);

                    // Remove the disabled attribute from the button
                    $(this).removeClass('disable');
                } else {
                    // Add the button value to the array
                    seatArray.push(buttonValue);

                    // Disable the button
                    $(this).addClass('disable');
                }

                console.log(seatArray);
            });

            let submitButton =document.getElementById('submit');

            submitButton.addEventListener('click',function(){
                let userName = document.getElementById('name').value;

                $.ajax({
                url: 'seatsQuery.php',
                type: 'POST',
                data: {
                    userName:userName,
                    seatArray: seatArray
                },
                success:function (data){
                    $('#result').html(data);
                }
                
            })
            // e.target.reset();
            })
            

           







        });

    </script>
</body>

</html>