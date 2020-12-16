const urlPrestadores = "http://localhost/bernardo/bancodedados/src/controll/routes/route.prestadores.php?id_prest=0";

function carregaPrestadores() {

    fetch(urlPrestadores)
        .then(function (resp) {
            //Obtem a resposta da URL no formato JSON
            if (!resp.ok)
                throw new Error("Erro ao executar requisição: " + resp.status);
            return resp.json();
        })
        .then(function (data) {
            //Se obteve a resposta explora os dados recebidos
            data.forEach((val) => {
                let row = document.createElement("tr");
                row.innerHTML = `<tr><td>${val.id_prest}</td>`;
                row.innerHTML += `<td>${val.nome}</td>`;
                row.innerHTML += `<td>${val.telefone}</td>`;
                row.innerHTML += `<td>${val.funcoes}</td>`;

                row.innerHTML += `<td style="padding:3px"><button onclick='editPessoa(this)'>Edit</button><button onclick='delPessoa(this)'>Del</button></td></tr>`;
                tablePessoa.appendChild(row);
            });
        }) //Se obteve erro no processo exibe no console do navegador
        .catch(function (error) {
            console.error(error.message);
        });
}