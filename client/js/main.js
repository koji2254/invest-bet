const user_id = document.getElementById('get_user_id');
const imgPreview = document.getElementById('img_preview');
const imgSelect = document.getElementById('img_select');

const profileBtn  = document.getElementById('update_profile_btn')
const full_name = document.getElementById('full_name')
const email = document.getElementById('email')
const address = document.getElementById('address')
const phone_1 = document.getElementById('phone_1')
const phone_2 = document.getElementById('phone_2')
const select_bank = document.getElementById('select_bank')
const account_name = document.getElementById('account_name')
const account_number = document.getElementById('account_number')
// console.log(select_bank.value)

setTimeout(() => {
    console.log(select_bank.value)
}, 3000)

const profile_info = (e) => {
    e.preventDefault()

   let profile = {
      'personal_info' : {
        'full_name' : full_name.value,
        'email' : email.value,
        'phone_1' : phone_1.value,
        'phone_2' : phone_2.value,
        'address' : address.value,     
        'img':'../../img.url',      
        'acct_status':'silver',
        'user_id':user_id.value,
      },
      'bank_info' : {
        'bank_name' : select_bank.value,
        'account_name' : account_name.value,
        'account_number' : account_number.value,          
        'acct_status':'silver',
        'user_id':user_id.value,
      },
      
      'user_id':user_id.value,
      'api_key':'1234567890',
      'request_type':'update_profile',
   }

   updateProfile(profile)
//    console.log(profile)
}


const getUserInfo = async () => {
    const response = await fetch('http://localhost/invest_bet/api/client/read.php?user_id=1212814&api_key=1234567890',{
        method:'GET',
        headers:{
            'Content-Type' :'application/json',
        },
    })
}

const updateProfile = async (profile) => {
    const response = await fetch('http://localhost/invest_bet/api/client/index.php',{
        method:'POST',
        headers:{
            'Content-Type' :'application/json',
        },
        body: JSON.stringify(profile)
    })

    const data = await response.json()
    // console.log(data)
}

profileBtn.addEventListener('click', profile_info)
