<!DOCTYPE html>
<html ng-app="mainApp">
    <head>
        <title>Gomax</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link href="<?php echo asset_url();?>css/skin.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
        <script src="<?php echo asset_url();?>js/app/mainApp.js"></script>
        <script src="<?php echo asset_url();?>js/app/controllers/menuController.js"></script>
        <?php if(controller() != ""):?>
            <script src="<?php echo asset_url();?>js/app/controllers/<?php echo controller();?>Controller.js"></script>
        <?php endif?>
    </head>
    <body>
        <div class="header">
            <div class="header__left">

            </div>
            <div class="header__right">

            </div>

        </div>
        <div class="content">
            <div class="content__left menu" ng-controller="menuController">
                <ul class="list-group">
                    <li ng-repeat="(header, submenu) in menu[0]" class="list-group-item">
                        <h3> {{ header }} </h3>
                        <div class="list-group">
                            <a ng-repeat="(title, href) in submenu[0]" href="{{ href }}" class="list-group-item">
                                {{ title }}
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="content__middleright">
                <?php echo $content?>
            </div>
        </div>
        
        <footer>

        </footer>
    </body>
</html>
