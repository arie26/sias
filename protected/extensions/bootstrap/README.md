Yii-bootstrap Installation
=====================
Fork https://bitbucket.org/Crisu83/yii-bootstrap
Download
--------

Download or checkout (SVN/Git) from https://bitbucket.org/sakhalin/yii-bootstrap and unpack files in your protected/extensions/bootstrap

Git clone
---------
    cd protected/extensions/
    git clone git@bitbucket.org:sakhalin/yii-bootstrap.git bootstrap

Configure
---------

Change your config main:

    return array(
    # ...
        'preload'=>array(
            .....
            'bootstrap', // preload the bootstrap component
        ),
        'modules'=>array(
            .....
            'gii'=>array(
                .....
                'generatorPaths'=>array(
                    'bootstrap.gii',
                ),
            ),
        ),
        'components'=>array(
            .....
            'bootstrap'=>array(
                'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
            ),
        ),
    #..
    );

You're done! Now you can start using Bootstrap in your application. For examples on how to use the widgets please visit the demo page.

Configure your git in project
---------
Add to your .gitinnore

protected/extensions/bootstrap/demo


