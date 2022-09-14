<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/canvas.css">
    <title>Document</title>
</head>
<body>
    
    <canvas>

    </canvas>



    <script>

        
        const canvas = document.querySelector('canvas');
        const context = canvas.getContext('2d');
        let tableImage = [];
        

        function getCursorPosition(canvas, event) {
            const rect = canvas.getBoundingClientRect()
            const x = event.clientX - rect.left
            const y = event.clientY - rect.top
            console.log("x: " + x + " y: " + y)
        }

        class CaptchaImage {
            constructor(position, imageSrc) {
                this.position = position;
                this.image = new Image();
                this.image.src = imageSrc;
            }

            draw() {
                context.drawImage(this.image, this.position.x, this.position.y, 100, 50)
            }
        }

        canvas.addEventListener('click', function(event) {
            getCursorPosition(canvas, event);
        })

        function fillTable(){
            let image1 = new CaptchaImage({x: 0, y: 0}, '../src/img/canvas/1.jpg');
            tableImage.push(image1)
            let image2 = new CaptchaImage({x: 100, y: 0}, '../src/img/canvas/2.jpg');
            tableImage.push(image2)
            let image3 = new CaptchaImage({x: 200, y: 0}, '../src/img/canvas/3.jpg');
            tableImage.push(image3)
            let image4 = new CaptchaImage({x: 0, y: 50}, '../src/img/canvas/4.jpg');
            tableImage.push(image4)


            let image5 = new CaptchaImage({x: 200, y: 50}, '../src/img/canvas/5.jpg');
            tableImage.push(image5)
            let image6 = new CaptchaImage({x: 0, y: 100}, '../src/img/canvas/6.jpg');
            tableImage.push(image6)
            let image7 = new CaptchaImage({x: 100, y: 100}, '../src/img/canvas/7.jpg');
            tableImage.push(image7)
            let image8 = new CaptchaImage({x: 200, y: 100}, '../src/img/canvas/8.jpg');
            tableImage.push(image8)
        }

        fillTable();
        console.log(tableImage);

        function showTable(){
            tableImage.forEach(item => {
                item.draw();
            })
        }

        showTable();

        

    </script>
</body>
</html>