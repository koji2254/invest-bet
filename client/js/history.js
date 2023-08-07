  let user_id = document.getElementById('user_id')
  user_id = user_id.value;
  const get_history = async () => {
    const response = await fetch(`http://localhost/invest_bet/api/client/read.php?user_id=${user_id}&api_key=1234567890&request_type=get_all_history`,{
        method:'GET',
        headers:{
            'Content-Type' :'application/json',
        },
    })

    const data = await response.json()

    console.log(data)
 }

 get_history()
