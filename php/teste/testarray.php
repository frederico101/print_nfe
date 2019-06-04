<?php

$test = [];

$test = "Array
(
    [retorno] => Array
        (
            [pedidos] => Array
                (
                    [0] => Array
                        (
                            [pedido] => Array
                                (
                                    [desconto] => 0,00
                                    [observacoes] => 
                                    [observacaointerna] => 
                                    [data] => 2019-02-14
                                    [numero] => 336
                                    [vendedor] => 
                                    [valorfrete] => 0.00
                                    [totalprodutos] => 139.80
                                    [totalvenda] => 139.80
                                    [situacao] => Atendido
                                    [loja] => 203308153
                                    [numeroPedidoLoja] => 1550160674382
                                    [tipoIntegracao] => Xtech
                                    [cliente] => Array
                                        (
                                            [nome] => Ana karoline Jesus
                                            [cnpj] => 471.590.078-59
                                            [ie] => 
                                            [rg] => 
                                            [endereco] => Rua General Carneiro
                                            [numero] => 141 N
                                            [complemento] => 
                                            [cidade] => Carapicuíba
                                            [bairro] => Jardim Ana Estela
                                            [cep] => 06.355-080
                                            [uf] => SP
                                            [email] => anynha_agnus@hotmail.com
                                            [celular] => 
                                            [fone] => (11) 96117-6249
                                        )

                                    [itens] => Array
                                        (
                                            [0] => Array
                                                (
                                                    [item] => Array
                                                        (
                                                            [codigo] => MBF-1-M-L-S_DBALL
                                                            [descricao] => MOLETOM FULL UNISSEX - DRAGON BALL COR:PRETO;TAMANHO:M;CAPUZ:LISO;BOLSO:SEM BOLSO
                                                            [quantidade] => 2.0000
                                                            [valorunidade] => 69.9000000000
                                                            [precocusto] => 0.0000000000
                                                            [descontoItem] => 0.00
                                                            [un] => UN
                                                            [pesoBruto] => 0.750
                                                            [largura] => 16.00
                                                            [altura] => 2.00
                                                            [profundidade] => 11.00
                                                            [descricaoDetalhada] => 
                                                            [unidadeMedida] => cm
                                                        )

                                                )

                                        )

                                    [parcelas] => Array
                                        (
                                            [0] => Array
                                                (
                                                    [parcela] => Array
                                                        (
                                                            [valor] => 139.80
                                                            [dataVencimento] => 2019-02-14 00:00:00
                                                            [obs] => Método Pagamento: BOLETO
                                                            [forma_pagamento] => Array
                                                                (
                                                                    [id] => 0
                                                                    [descricao] => Dinheiro
                                                                    [codigoFiscal] => 1
                                                                )

                                                        )

                                                )

                                        )

                                    [nota] => Array
                                        (
                                            [serie] => 1
                                            [numero] => 000173
                                            [dataEmissao] => 2019-03-11 12:18:25
                                            [situacao] => 7
                                            [valorNota] => 139.80
                                            [chaveAcesso] => 31190332883772000105550010000001731704782310
                                        )

                                    [transporte] => Array
                                        (
                                            [transportadora] => Total express
                                            [cnpj] => 
                                            [tipo_frete] => R
                                            [enderecoEntrega] => Array
                                                (
                                                    [nome] => Ana karoline Jesus
                                                    [endereco] => Rua General Carneiro
                                                    [numero] => 141 N
                                                    [complemento] => 
                                                    [cidade] => Carapicuíba
                                                    [bairro] => Jardim Ana Estela
                                                    [cep] => 06.355-080
                                                    [uf] => SP
                                                )

                                            [volumes] => Array
                                                (
                                                    [0] => Array
                                                        (
                                                            [volume] => Array
                                                                (
                                                                    [idServico] => 5327144266
                                                                    [servico] => Expresso
                                                                    [codigoRastreamento] => 
                                                                    [valorFretePrevisto] => 12.93
                                                                    [remessa] => Array
                                                                        (
                                                                            [numero] => 45654022
                                                                            [dataCriacao] => 2019-03-11
                                                                        )

                                                                    [dataSaida] => 2019-03-07
                                                                    [prazoEntregaPrevisto] => 3
                                                                    [valorDeclarado] => 0.00
                                                                    [dimensoes] => Array
                                                                        (
                                                                            [peso] => 0.000
                                                                            [altura] => 0
                                                                            [largura] => 0
                                                                            [comprimento] => 0
                                                                            [diametro] => 0
                                                                        )

                                                                )

                                                        )

                                                )

                                            [servico_correios] => Expresso
                                        )

                                    [codigosRastreamento] => Array
                                        (
                                            [codigoRastreamento] => 
                                        )

                                )

                        )
";
echo json_decode($test, true);






      print_r($test['retorno']); 
           