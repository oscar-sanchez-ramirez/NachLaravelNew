<script>
    const url = 'http://127.0.0.1:8000/api/test';
    const urlPost = 'http://127.0.0.1:8000/api/testPost';

    function getAxios() {
        axios.get(url)
            .then(function(response) {
                console.log('axios');
                console.log(response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    function getFetch() {
        fetch(url)
            .then(response => response.json())
            .then(data => {
                console.log('fetch');
                console.log(data);
            })
            .catch(error => console.log(error));
    }

    function postUser() {
        const f = new FormData();
        const name = document.querySelector('#IDname').value;
        const email = document.querySelector('#IDemail').value;
        const password = document.querySelector('#IDpassword').value;
        

        f.append('name', name);
        f.append('email', email);
        f.append('password', password);
        f.append('estatus', 1);
        f.append('avatar', 'images/postUsuario');
        axios.post(urlPost, f)
            .then(function(response) {
                console.log('POST axios');
                document.getElementById('myform').reset();
                alert(response.data.msj);
                console.log(response.data);
            })
            .catch(function(error) {
                alert(error);
                console.log(error);
            });
    }
</script>