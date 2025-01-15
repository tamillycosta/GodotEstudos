<section class="main-container">

    <section class="dashBoard w_100 box_shadow">

    <?php
        $Painel = new Painel();
        $numUsuarios = $Painel->listarUsuariosOnline();
    ?>
    
    <div class="dashboard-elements">
    <h2><?php echo count($numUsuarios)?>
        Usuarios Online!</h2>
        <i class="fa-solid fa-users"></i>
        
    </div>

    <div class="dashboard-elements">
        <h2>10 Total de Visitas!</h2>
        <i class="fa-solid fa-envelope"></i>
        
    </div>

    <div class="dashboard-elements">
        <h2>10 Visitas Hoje!</h2>
        <i class="fa-solid fa-phone"></i>
    
    </div>

    </section>

    <section class="user-table w_100 box_shadow">
        <div class="box-title">
        <i class="fa-solid fa-users"></i>
        <h2>Usuários Online</h2>
        </div>

    
        <div class="row">
            <div class="col">
                <span>IP</span>
            </div><!--col-->
            <div class="col">
                <span>Ultima Ação</span>
            </div><!--col-->
        </div>

        <?php
        for($i = 0; $i<=10; $i++ )
        {
        ?>

        <div class="row">
            <div class="col">
                <span>190.190.190</span>
            </div><!--col-->
            <div class="col">
                <span>19/09/2017 19:00:00</span>
            </div><!--col-->
            <div class="clear" ></div>
        </div>
            <?php
        }
            ?>

    </section>
</section>