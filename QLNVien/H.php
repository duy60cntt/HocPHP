<html>

<head>
    <title> An Horizontal Menu </title>
    <!-- Link to external stylesheet -->
    <style>
        * {
            text-align: center;
            /*background-color: seashell;*/
            margin-left: auto;
            margin-right: auto;

        }

        #menu {
            width: 100%;
            border: 1px solid #000;
            height: 50px;
            font-size: 13px;

        }

        #menu ul {
            margin-top: 20px;
        }

        #menu ul li {
            list-style-type: none;
            display: inline;
            margin-left: 100px;
        }

        #menu ul li a:link {
            color: black;
            text-decoration: none;
            text-transform: uppercase;

        }
    </style>
</head>

<body>
    <div id="menu">
        <!--Start the unordered list after the opening menu division -->
        <ul>
            <li><a href="Index_LNV.php">Loại Nhân Viên</a></li>
            <li><a href="Index_NV.php">Nhân Viên</a></li>
            <li><a href="Index_PB.php">Phòng Ban</a></li>

        </ul>
    </div>

</body>

</html>