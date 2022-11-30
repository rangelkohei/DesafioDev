    //FUNÇÃO CONSOME API VIACEP
    function ProcuraCep(){
        let cepDOM = document.getElementById('cep').value;                      //PEGANDO VALOR DO CAMPO QUE POSSUI O ID "CEP"
        let url = `https://viacep.com.br/ws/${cepDOM}/json/`;                   //URL DA API

        if(cepDOM.length !== 8){                                                //VERIFICA SE O TAMANHO DE DIGITOS DO CEP É DIFERENTE DE 8
            alert("NUMERO DE DIGITOS DO CEP DEVE SER IGUAL A 8");
        }

        fetch(url).then(function(response){                                     //FETCH PARA A API
            //console.log(response);
            response.json().then(function(data){                                //TRAZ EM JSON
                console.log(data);
                MostraResult(data);
            });
        });
    
    }

    //FUNÇÃO QUE MOSTRA O RESULTADO DA API NO INPUT TEXT
    function MostraResult(dataParam){
        document.getElementById('local').value      = dataParam.localidade;
        document.getElementById('bairro').value     = dataParam.bairro;
        document.getElementById('logra').value      = dataParam.logradouro;
        document.getElementById('ddd').value        = dataParam.ddd;
        document.getElementById('uf').value         = dataParam.uf;
        document.getElementById('ibge').value       = dataParam.ibge;
    } 