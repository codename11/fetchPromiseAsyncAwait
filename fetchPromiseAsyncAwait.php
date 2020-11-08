<!DOCTYPE html>
<html>
<title>async await</title>
<body>
<script>

	let url = "http://worldapi.test/api/countries";

	/*fetch(url)
		.then((response1) => {
			return response1;
		})
		.then((response1) => {
			
			return [response1, fetch(url)];

		})
		.then((arr) => {

			return arr[0].json();
			
		})
		.then((data) => {
			
			console.log(data);

		});*/

	/*let f1 = fetch(url);
	let f2 = fetch(url);
	let f3 = fetch(url);

	Promise.all([f1.then((response) => {
		return response.json();
	}), f2.then((response) => {
		return response.json();
	}), f3.then((response) => {
		return response.json();
	})]).then(([f1, f2, f3]) => {

		console.log(f1,", ", f2,", ", f3);

	}).catch((err) => {
		console.log(err);
	});*/

	function doubleAfter2Seconds(x) {
	  return new Promise(resolve => {
		setTimeout(() => {
		  resolve(x * 2);
		}, 2000);
	  });
	}

	/*doubleAfter2Seconds(10).then((r) => {
	  console.log(r);
	});*/
	
	async function addAsync(x) {
	  const a = await doubleAfter2Seconds(10);
	  const b = await doubleAfter2Seconds(20);
	  const c = await doubleAfter2Seconds(30);
	  return x + a + b + c;
	}
	
	/*addAsync(10).then((sum) => {
	  console.log(sum);
	});*/
	
	async function getData(url = '', data = {}) {
	  
		let result = await fetch(url)
			.then((response) => response.json())
			.then((data) => console.log(data))
			.catch((error) => {
			  console.error('Error:', error);
		}); 
		
		return result;
	}

	//getData('https://en.wikipedia.org/w/api.php?&origin=*&action=opensearch&search=Serbia&limit=5');
	//getData('http://worldapi.test/api/countries ');

	// Example POST method implementation:
	async function postData(url = '', data = {}) {
	  // Default options are marked with *
		 const result = await fetch(url, {
			method: 'POST', // *GET, POST, PUT, DELETE, etc.
			mode: 'cors', // no-cors, *cors, same-origin
			cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
			credentials: 'same-origin', // include, *same-origin, omit
			headers: {
			  'Content-Type': 'application/json'
			},
			redirect: 'follow', // manual, *follow, error
			referrerPolicy: 'origin-when-cross-origin', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
			body: JSON.stringify(data) // body data type must match "Content-Type" header
		 })
		.then((response) => response.json())// parses JSON response into native JavaScript objects
		.then((data) => console.log(data))
		.catch((error) => {
			  console.error('Error:', error);
		});
		
		return result;
		
	}

	let body = {
        "Code": "Zem",
        "Name": "Zemlja",
        "Continent": "Asia",
        "Region": "Southern and Central Asia",
        "SurfaceArea": 652090,
        "IndepYear": 1919,
        "Population": 22720000,
        "LifeExpectancy": 45.9,
        "GNP": 5976,
        "GNPOld": null,
        "LocalName": "Afganistan/Afqanestan",
        "GovernmentForm": "Islamic Emirate",
        "HeadOfState": "Mohammad Omar",
        "Capital": null,
        "Code2": "AF"
    };
	//postData('http://worldapi.test/api/country', body);
	
</script>


</body>
</html>