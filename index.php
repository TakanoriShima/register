<?php

    require_once 'UserDAO.php';
  
    try {
    
        $user_dao = new UserDAO();
        $users = $user_dao -> getAllUsers();
        
    } catch (PDOException $e) {
        echo 'PDO exception: ' . $e->getMessage();
        exit;
    }
    
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="shortcut icon" href="favicon.ico">
        <title>会員一覧</title>
        <style>
            h2{
                color: red;
                background-color: pink;
            }
            .icon{
                width: 100px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row mt-2">
                <h1 class=" col-sm-12 text-center">会員一覧</h1>
            </div>
            <div class="row mt-2">
            <?php if(count($users) !== 0){ ?> 
                <table class="col-sm-12 table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>ユーザ名</th>
                        <th>ニックネーム</th>
                        <th>メールアドレス</th>
                        <th>パスワード</th>
                        <th>アイコン画像</th>
                        <th>登録日時</th>
                    </tr>
                    </tr>
                <?php foreach($users as $user){ ?>
                    <tr>
                        <td><?php print $user['id']; ?></a></td>
                        <td><?php print $user['name']; ?></td>
                        <td><?php print $user['nickname']; ?></td>
                        <td><?php print $user['email']; ?></td>
                        <td><?php print $user['password']; ?></td>
                        <td><img src="<?php print ICON_DIR . $user['image']; ?>" class="icon"></td>
                        <td><?php print $user['created_at']; ?></td>
                  
                    </tr>
                <?php } ?>
                </table>
            <?php }else{ ?>
                    <p>データ一件もありません。</p>
            <?php } ?>
            </div>
            <div class="row mt-5">
                <a href="new.php" class="btn btn-primary">新規投稿</a>
            </div> 
        </div>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS, then Font Awesome -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>
