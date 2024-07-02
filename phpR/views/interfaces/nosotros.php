<?php
include("./models/cursos.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h2>Estudiantes UTA</h2>
        <button class="btn btn-primary mb-3" onclick="newUser()">Nuevo Estudiante</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Curso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="studentsTable">
                <!-- Datos de estudiantes -->
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentModalLabel">Nuevo Estudiante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="studentForm">
                        <input type="hidden" id="cedula" name="cedula">
                        <div class="mb-3">
                            <label for="ced_est" class="form-label">Cedula:</label>
                            <input type="text" class="form-control" id="ced_est" name="ced_est" required>
                        </div>
                        <div class="mb-3">
                            <label for="nom_est" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nom_est" name="nom_est" required>
                        </div>
                        <div class="mb-3">
                            <label for="ape_est" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" id="ape_est" name="ape_est" required>
                        </div>
                        <div class="mb-3">
                            <label for="tel_est" class="form-label">Teléfono:</label>
                            <input type="text" class="form-control" id="tel_est" name="tel_est" required>
                        </div>
                        <div class="mb-3">
                            <label for="dir_est" class="form-label">Dirección:</label>
                            <input type="text" class="form-control" id="dir_est" name="dir_est" required>
                        </div>
                        <div class="mb-3">
                            <label for="nom_cur" class="form-label">Curso:</label>
                            <select class="form-control" id="nom_cur" name="nom_cur" required>
                                <option value="">Seleccionar</option>
                                <!-- Las opciones de cursos se cargarán aquí -->
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['id_cur'] ?>"><?php echo $row['nom_cur'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            loadCourses();
            loadStudents();

            $('#studentForm').on('submit', function(event) {
                event.preventDefault();
                if ($('#cedula').val() === '') {
                    saveNewUser();
                } else {
                    saveUserEdit();
                }
            });
        });

        function loadCourses() {
            $.getJSON('./models/cursos.php', function(data) {
                var $select = $('#nom_cur');
                $select.empty();
                $select.append('<option value="">Seleccionar</option>');
                $.each(data, function(key, val) {
                    $select.append('<option value="' + val.id_cur + '">' + val.nom_cur + '</option>');
                });
            });
        }

        function loadStudents() {
            $.getJSON('./models/select.php', function(data) {
                var $table = $('#studentsTable');
                $table.empty();
                $.each(data, function(key, val) {
                    $table.append('<tr>' +
                        '<td>' + val.ced_est + '</td>' +
                        '<td>' + val.nom_est + '</td>' +
                        '<td>' + val.ape_est + '</td>' +
                        '<td>' + val.tel_est + '</td>' +
                        '<td>' + val.dir_est + '</td>' +
                        '<td>' + val.nom_cur + '</td>' +
                        '<td>' +
                        '<button class="btn btn-warning btn-sm" onclick="editUser(\'' + val.ced_est + '\')">Editar</button> ' +
                        '<button class="btn btn-danger btn-sm" onclick="deleteUser(\'' + val.ced_est + '\')">Eliminar</button>' +
                        '</td>' +
                        '</tr>');
                });
            });
        }

        function newUser() {
            $('#studentForm')[0].reset();
            $('#cedula').val('');
            $('#ced_est').prop('readonly', false);
            $('#studentModalLabel').text('Nuevo Estudiante');
            $('#studentModal').modal('show');
        }

        function editUser(cedula) {
            $.getJSON('./models/user.php', {
                ced_est: cedula
            }, function(data) {
                $('#ced_est').val(data.ced_est);
                $('#nom_est').val(data.nom_est);
                $('#ape_est').val(data.ape_est);
                $('#tel_est').val(data.tel_est);
                $('#dir_est').val(data.dir_est);
                $('#nom_cur').val(data.nom_cur);
                $('#cedula').val(data.ced_est); // Hidden field to identify the user for updating
                $('#ced_est').prop('readonly', true);
                $('#studentModalLabel').text('Editar Estudiante');
                $('#studentModal').modal('show');
            });
        }

        function saveNewUser() {
            $.ajax({
                url: './models/insert.php',
                method: 'POST',
                data: $('#studentForm').serialize(),
                success: function(response) {
                    $('#studentModal').modal('hide');
                    loadStudents();
                }
            });
        }

        function saveUserEdit() {
            $.ajax({
                url: './models/update.php',
                method: 'POST',
                data: $('#studentForm').serialize(),
                success: function(response) {
                    $('#studentModal').modal('hide');
                    loadStudents();
                }
            });
        }

        function deleteUser(cedula) {
            if (confirm('¿Está seguro?')) {
                $.post('./models/delete.php', {
                    ced_est: cedula
                }, function(response) {
                    loadStudents();
                });
            }
        }
    </script>
</body>

</html>