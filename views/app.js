function addCourse() {
     var addCourse = document.getElementById('addCourse');
     var linkAddCourse = document.getElementById('linkAddCourse');
     addCourse.removeChild(linkAddCourse);
     addCourse.innerHTML = '<form action="../controllers/user.php?action=crearCurso();" method="POST"><input type="text" name="idPrograma" class="form-control" placeholder="N° Ficha"><br><input type="text" name="nomFicha" class="form-control mt-n4" placeholder="Nombre Ficha"><br><a class="nav-link mt-n3 d-inline" href="dashboard.php">Cancelar</a><input type="submit" class="btn-primary mt-n3 d-inline" href="dashboard.php" value="Crear"></form>';
}