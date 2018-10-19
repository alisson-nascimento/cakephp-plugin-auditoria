<section class="content-header">
  <h1>
    <?php echo __('Auditoria Registro') . ' #' . $auditoriaRegistro->id; ?> 
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Listagem'), ['action' => 'index'], ['escape' => false])?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-info"></i>
                <h3 class="box-title"><?php echo __('Dados'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <dl class="dl-horizontal">
                                                                                                                <dt><?= __('Modelo Table') ?></dt>
                                        <dd>
                                            <?= h($auditoriaRegistro->modelo_table) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Modelo Pk') ?></dt>
                                <dd>
                                    <?= $this->Number->format($auditoriaRegistro->modelo_pk) ?>
                                </dd>
                                                                                                                <dt><?= __('Created By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($auditoriaRegistro->created_by) ?>
                                </dd>
                                                                                                                <dt><?= __('Updated By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($auditoriaRegistro->updated_by) ?>
                                </dd>
                                                                                                
                                                                                                                                                            <dt><?= __('Deleted') ?></dt>
                                <dd>
                                    <?= h($auditoriaRegistro->deleted) ?>
                                </dd>
                                                                                                    
                                            
                                    </dl>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- ./col -->
</div>
<!-- div -->

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Registros de {0} Relacionados', ['Auditoria Logs']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($auditoriaRegistro->auditoria_logs)): ?>

                    <table class="table table-bordered"class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Auditoria Registro Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Tipo Acao
                                    </th>
                                        
                                                                                                        
                                    <th>
                                    Created By
                                    </th>
                                        
                                                                    
                                    <th>
                                    Dados Antigos
                                    </th>

                            </tr>

                            <?php foreach ($auditoriaRegistro->auditoria_logs as $auditoriaLogs): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($auditoriaLogs->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($auditoriaLogs->auditoria_registro_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($auditoriaLogs->tipo_acao) ?>
                                    </td>
                                                                                                            
                                    <td>
                                    <?= h($auditoriaLogs->created_by) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($auditoriaLogs->dados_antigos) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
