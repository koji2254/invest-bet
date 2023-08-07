// let array = []

const getUserInfo = async () => {
    // const response = await fetch('../../api/client/note.json')
    const response = await fetch('http://localhost/invest_bet/api/client/read.php?user_id=4595122&api_key=1234567890')

    const data = await response.json()
    console.log(data)

    // let infos = data;

    // populateProfile(infos)

}

const populateProfile = (infos) => {
    console.log(infos)
}

getUserInfo()



