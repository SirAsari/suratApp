const URL = "http://127.0.0.1:4000/api/";

async function Get(path, params) {
    const queryString = new URLSearchParams(params).toString();
    const url = `${URL}${path}${queryString ? `?${queryString}` : ''}`;
    return await fetch(url).then((res) => res.json());
  }
  

async function Post(path, data) {
    return await fetch(`${URL}${path}`, {
        method: "POST",
        body: JSON.stringify(data),
        headers: {
            "Content-type": "application/json",
        },
    }).then((res) => res.json());
}



export { Get, Post };