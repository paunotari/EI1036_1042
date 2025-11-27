<select id="selectorTipo">
    <option value="">Selecciona tipo</option>
    <option value="admin">Admin</option>
    <option value="visitante">Visitante</option>
</select>

<script>
//crea coockie cuando user selects ("login") su tipo de user
document.querySelector("#selectorTipo").addEventListener("change", function() {
    const tipo = this.value;
    document.cookie = "tipoUsuario=" + tipo + "; path=/; max-age=31536000"; // 1 año
    location.reload(); // recargar portal para aplicar estilos
});
</script>