async function request(method, end, data = {}) {
    let url = import.meta.env.VITE_API_ENDPOINT
    url += "/" + end + "/"
    console.log(url)
    let response
    if(method.toUpperCase() === 'GET'){
        response = await fetch(url, {
            method: method.toUpperCase(),
            headers: {
                "Content-Type": "application/json",
                "accept": "application/json",
            }
        });
        // return response.json();
    }else{
        response = await fetch(url, {
            method: method.toUpperCase(),
            headers: {
                "Content-Type": "application/json",
                "accept": "application/json",
            },
            body: JSON.stringify(data),
        });
    }
    // response.json()
    // .then((data) =>{
    //     console.log(data);
    //     return data
    // })
    return response.json()

}

export{
    request
}