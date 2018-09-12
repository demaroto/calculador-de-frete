    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $this->Html->link('Calculador de Frete', array('controller' => '/', 'action' => '/'), array('class' => 'navbar-brand')); ?>
          <!--<a class="navbar-brand" href="#">Calculadora de Frete</a> -->
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <li><?php echo $this->Html->link('Novo calculador', array('controller' => 'calculars', 'action' => 'add')); ?></li>
               <li><?php echo $this->Html->link('Contato', array('controller' => 'contatos', 'action' => 'index')); ?></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>