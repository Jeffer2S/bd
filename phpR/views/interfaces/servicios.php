<?php
include("./models/cursos.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Basic CRUD Application - jQuery EasyUI CRUD Demo</title>
    <link rel="stylesheet" type="text/css" href="./jquery/themes/black/easyui.css">
    <link rel="stylesheet" type="text/css" href="./jquery/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="./jquery/themes/color.css">
    <link rel="stylesheet" type="text/css" href="./jquery/demo/demo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.easyui.min.js"></script>
</head>

<body>
    <h2>Estudiantes UTA</h2>

    <table id="dg" title="Estudiantes" class="easyui-datagrid" style="width:700px;height:250px" url="./models/select.php" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" onClickRow="reporteUnico()">
        <thead>
            <tr>
                <th field="ced_est" width="50">Cédula</th>
                <th field="nom_est" width="50">Nombre</th>
                <th field="ape_est" width="50">Apellido</th>
                <th field="tel_est" width="50">Teléfono</th>
                <th field="dir_est" width="50">Dirección</th>
                <th field="nom_cur" width="50">Curso</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar</a>
        <a href="./reportes/reporteGeneral.php" target="_blank" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="reporteGeneral()">Reporte General</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="reporteUnico()">Reporte Único</a>
        <a href="./reportes/reporte2.php" class="easyui-linkbutton" iconCls="icon-add" plain="true" target="_blank">Reporte Jasper</a>
    </div>

    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Estudiante</h3>
            <div style="margin-bottom:10px">
                <input name="ced_est" class="easyui-textbox" required="true" label="Cédula:" style="width:100%" id="cedula">
            </div>
            <div style="margin-bottom:10px">
                <input name="nom_est" class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="ape_est" class="easyui-textbox" required="true" label="Apellido:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="tel_est" class="easyui-textbox" required="true" label="Teléfono:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="dir_est" class="easyui-textbox" required="true" label="Dirección:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <select name="nom_cur" class="easyui-combobox" required="true" label="Curso:" style="width:100%">
                    <option value="">Seleccionar</option>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id_cur'] ?>"><?php echo $row['nom_cur'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>

    <div id="pdfContainer"></div>

    <script type="text/javascript">
        var url;

        function newUser() {
            $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Nuevo Estudiante');
            $('#fm').form('clear');
            $('#cedula').textbox('readonly', false);  // Hacer el campo cédula editable
            url = 'models/insert.php';
        }

        function editUser() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Editar Estudiante');
                $('#fm').form('load', row);
                $('#cedula').textbox('readonly', true);  // Hacer el campo cédula no editable
                url = 'models/update.php?ced_est=' + row.ced_est;
            }
        }

        function saveUser() {
            $('#fm').form('submit', {
                url: url,
                iframe: false,
                onSubmit: function() {
                    return $(this).form('validate');
                },
                success: function(result) {
                    var result = eval('(' + result + ')');
                    if (result.errorMsg) {
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlg').dialog('close'); // close the dialog
                        $('#dg').datagrid('reload'); // reload the user data
                    }
                }
            });
        }

        function destroyUser() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $.messager.confirm('Confirm', '¿Está seguro?', function(r) {
                    if (r) {
                        $.post('models/delete.php', {
                            ced_est: row.ced_est
                        }, function(result) {
                            if (!result.success) {
                                $('#dg').datagrid('reload'); // reload the user data
                            } else {
                                $.messager.show({ // show error message
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        }, 'json');
                    }
                });
            }
        }

        function reporteUnico() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                var cedula = row.ced_est;
                var reportUrl = './reportes/reporteUnico.php?cedula=' + cedula;
                window.open(reportUrl, '_blank');
            } else {
                $.messager.alert('Error', 'Por favor seleccione un estudiante.', 'error');
            }
        }

        function reporteGeneral() {
            window.open('./reportes/reporteGeneral.php', '_blank');
        }
    </script>

</body>

</html>
