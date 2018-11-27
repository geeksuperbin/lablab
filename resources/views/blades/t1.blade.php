<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blade 模板引擎</title>
    <style>
        #header {
            height:60px;
            background-color: #9d9d9d;
            margin-bottom: 5px;
            width:1024px;
        }

        #side-bar {
            background-color: #c0a16b;
            float:left;
            width:60px;
            height:200px;
            margin-right:10px;
        }


        #content {
            background-color: #6b9dbb;
            float:left;
            width:954px;
            height:200px;
        }

        #footer {
            height:60px;
            background-color: #f2dede;
            margin-bottom: 5px;
            width:1024px;
            float:left;
            margin-top:5px;
        }


    </style>
</head>
<body>

    <div id="header">
            <p>顶部栏</p>
    </div>
    <div>
        <div id = "side-bar" style="">
            <p>边栏</p>
        </div>
        <div id="content">
            <p>内容区</p>
            <?php
                echo "Hello World!!!";
                echo "sssssssss";
                echo "ddddd";
            ?>
        </div>
    </div>

    <div id="footer">
        <p>底部栏
        {{  $test1 or 'test1'  }}
    </div>
</body>
</html>