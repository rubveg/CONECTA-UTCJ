document.getElementById("formHorario").addEventListener("submit", function(e){
    e.preventDefault();

    let grupo = document.getElementById("grupo").value.trim();
    let turno = document.getElementById("turno").value;

    if(grupo === "" || turno === ""){
        alert("Debes ingresar grupo y turno.");
        return;
    }

    fetch("buscar_horario.php?grupo=" + grupo + "&turno=" + turno)
    .then(res => res.text())
    .then(data => {
        document.getElementById("resultado-horario").innerHTML = data;
    })
    .catch(err => {
        document.getElementById("resultado-horario").innerHTML = 
            "<p>Error al consultar el horario.</p>";
    });
});
