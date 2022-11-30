/*
	Este desafio me fez quebrar a cabeça para aprender e entender o metodo Quicksort pois eu nunca tinha ouvido falar nisso,
	confesso que precisei ler muito e ver até mesmo tutoriais no youtube para conseguir cumprir este desafio, então nao me sinto muito satisfeito
	fiz em um JS para ser executado em um terminal Node.
 */

function QuickSort(array){
	if(array.length === 0){ return []; }
	if(array.length === 1){ return array; }

	var pivot = array[0];

	var head = array.filter(n => n < pivot);
	var equal = array.filter(n => n === pivot);
	var tail = array.filter(n => n > pivot);

	return QuickSort(head).concat(equal).concat(QuickSort(tail));
}

let resultado = QuickSort([22,10,15,30,30,7,7,8,9,1]);
console.log(resultado);

//executar em um terminal "node QuickSort.js"