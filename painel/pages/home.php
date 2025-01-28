<?php
        namespace Milly\WebPagePhp;
        use Milly\WebPagePhp\controllers\UserOnlineController;

        $totalUsuariosHoje = UserOnlineController::countUsersToday();
        $totalUsuarios = UserOnlineController::countTotalUsers();
        $numUsuariosOnline = UserOnlineController::listUserOnline();
    ?>

<section class="main-container">

    <section class="dashBoard w_100 box_shadow">

   

    <div class="dashboard-elements">
    <h2><?php echo count($numUsuariosOnline)?>
        Usuarios Online!</h2>
        <i class="fa-solid fa-users"></i>
        
    </div>

    <div class="dashboard-elements">
        <h2><?php echo $totalUsuarios?> Total de Visitas!</h2>
        <i class="fa-solid fa-envelope"></i>
        
    </div>

    <div class="dashboard-elements">
        <h2><?php echo $totalUsuariosHoje?> Visitas Hoje!</h2>
        <i class="fa-solid fa-phone"></i>
    </div>

    </section>

    <section class="user-table w_100 box_shadow">
        <div class="box-title">
        <i class="fa-solid fa-users"></i>
        <h2>Usuários Online</h2>
        </div>

    
        <div class="row first">
            <div class="col">
                <span>IP</span>
            </div><!--col-->
            <div class="col">
                <span>Ultima Ação</span>
            </div><!--col-->
        </div>

        <?php
        foreach ($numUsuariosOnline as $usuario){

        
        ?>

        <div class="row">
            <div class="col">
                <span><?php echo $usuario['ip']?></span>
            </div><!--col-->
            <div class="col">
                <span><?php echo $usuario['ultima_acao']?></span>
            </div><!--col-->
            <div class="clear" ></div>
        </div>
            <?php
        }
            ?>

    </section>
</section>