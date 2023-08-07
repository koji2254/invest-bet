const generate_btn = document.getElementById('generate_pay')
const cancle_form_btn = document.getElementById('cancle_form')
const confirm_invoice_btn = document.getElementById('confirm_invoice')

// Payment Form
const payment_form = document.getElementById('payment_form')
const invoice_part = document.getElementById('invoice_part')

// Fields left for the user to input
const form_amount = document.getElementById('form_amount')
const exp_amount = document.getElementById('exp_amount')
const promo_code = document.getElementById('promo_code')
const niration = document.getElementById('niration')
const pay_method = document.getElementById('pay_method')

// Fixed Fields
// const user_id = document.getElementById('user_id')
const due_date = document.getElementById('due_date')
const date = document.getElementById('date')
const phone_1 = document.getElementById('phone_1')
const invoice_id = document.getElementById('invoice_id')
const user_id = document.getElementById('user_id')
const invoice_status = document.getElementById('invoice_status')
const full_name = document.getElementById('full_name')
const email = document.getElementById('email')
// console.log(user_id.value)


const process_form_data = (e) => {        
    e.preventDefault()
    if(form_amount.value === ''){
        alert('Pls enter an amount')
    }else{
        let form_obj = {
            'user_id' : user_id.value,
            'api_key' : '1234567890',
            'request_type' : 'new_invoice',
            'data' : {
                'user_id' : user_id.value,                
                'due_date' : due_date.textContent,
                'date' : date.textContent,
                'invoice_id' : invoice_id.textContent,
                'full_name' : full_name.textContent,
                'phone_1' : phone_1.textContent,
                'email' : email.textContent,
                'form_amount' : +form_amount.value,
                'promo_code' : promo_code.value,
                'exp_amount' : +exp_amount.value,
                'niration' : niration.value,
                'pay_method' : pay_method.value,                
            },
            'pay_details' : {
                'senders_name' : '',
                'alert_bank' : '',
                'amount_sent' : '',
                'date' : '',
            },
            'status':{
                'invoice_status' : 'Not Paid',
                'invoice_type' : 'Payment',
                'turn_btn' : '',
                'btn_style' : 'link-btn-2',
                'style' : 'link-btn-3',
                'msg_status' : '',
                'msg_error' : '',
                'deliverd' : 'Confirm',
                'btn_msg' : 'Send to Confirm',
                'date' : '20/20/20/'
            }
        }
        store_new_data(form_obj)
        payment_form.innerHTML = `
            <div class='sub-text-mini'>
             <h4 class='vat-margin'>Send a confirmation message to confirm your payment</h4>
            <a href="./history.php">              
               <h3>Check History <i class='fa fa-history'></i></h3>  
            </a>
            </div
        `;
        console.log('data')
   }
}

const store_new_data = async (form_data) => {
    const response = await fetch('http://localhost/invest_bet/api/client/index.php',{
        method:'POST',
        headers:{
            'Content-Type' :'application/json',
        },
        body: JSON.stringify(form_data)
    })

    const data = await response.json()
    // console.log(data)

}

// Make a new Form to get the main Invoice
const show_new_form = (e) => {
    payment_form.style.display = 'block';
    generate_btn.style.display = 'none';

    let output = `
    <div class="invoice-card-form small-font show-not " id="payment_form">
        <form action="">
        <div>
            <h5>Invoice Status</h5>
            <h3 id="invoice_status">Not Paid</h3>
        </div>
        <div class="display-flex">
            <div>
                <h5>Date</h5>
                <h4 id="date">20/20/2030</h4>
            </div>
            <div>
                <h5>Invoice Id</h5>
                <h4 id="invoice_id">23456789</h4>
            </div>
        </div>
        <div class="display-flex">
            <div>
                <h5>due Date</h5>
                <h4 id="due_date"></h4>
            </div>
            <div>
                <h5>User Id</h5>
                <h4 id="user_id"><?php echo $user->user_id ?></h4>
            </div>
        </div>
            <div class="display-flex">
            <div class="">
            <h5>Client Full Name</h5>
            <h4 id="full_name"><?php echo $user->full_name ?></h4>
            </div>
            <div class="">
            <h5>Email</h5>
            <h4 id="email"><?php echo $user->email ?></h4>
            </div>
            </div>
            <!-- / this is the inputs of the form  / -->
            <div>
            
            </div>
            <div class="display-flex">
            <div>
                <label class="form-label" for="amt">Amount #</label> 
                <input class="form-input" id="form_amount" type="number"> 
                
            </div>
            <div>
                <label class="form-label" for="amt">Exp %</label>
                <input class="form-input" type="number" id="exp_amount" value="900" readonly> 
            </div>
            </div>
                <div class="bg-white">
                    <label class="form-label" for="amt">Promo Code *</label>
                    <input class="form-input" type="number" id="promo_code" value="900" readonly> 
                </div>
                <div>
                    <label class="form-label" for="">Remark</label>
                    <input id="niration" class="form-input" type="text">
                </div>  
                <!--  payment types  -->
            <div class="">
                <div class="display-flex">
                    <div class="vat-margin">
                        <h4>Methods to Pay <i class="fa fa-credit-card"></i> </h4>
                    </div>
                    <div>
                        <select name="" id="pay_method">
                            <option value="transfer">Transfer<h4></h4></option>
                            <option value="cash"><h4>Cash</h4></option>
                            <option value="wallet">E-Wallet<h4></h4></option>
                        </select>
                    </div>
                </div>
            </div>
            <div>
                <h4 class="sub-text-mini mid-font">Our Bank Options</h4>
            </div>
            <div class="display-flex">
                <div class="sub-text-mini">
                <h4>First bank <i class="fa fa-bank"></i></h4>
                <h4>3120563910</h4>
                <h4>Bet Invest Org</h4>
                </div>
                <div class="sub-text-mini">
                <h4>Zenith Bank  <i class="fa fa-bank"></i></h4>
                <h4>2251819550</h4>
                <h4>Bet Invest Org</h4>
                </div>
            </div>
            <div class="display-flex">
            <button class="link-btn-5">Confirm Invoice</button>
            <button id="cancle_form" class="link-btn-4 text-white">Cancel</button>
            </div>
        </form> 
    </div> 
    `;
}

// Genarate a random invoice ID
const random_id = (e) => {
    let id = Math.floor(1000000 + Math.random() * 9000000);
    invoice_id.textContent = id;
    // console.log(id)
}
random_id()

// Make the payment form to appear
generate_btn.addEventListener('click', show_new_form)

cancle_form_btn.addEventListener('click', (e) => {
    e.preventDefault()
    payment_form.style.display = 'none'
    // payment_form.innerHTML = ''
    generate_btn.style.display = 'flex';    
})

form_amount.addEventListener('input', (e) => {
    exp_amount.value = +form_amount.value + (15/100 * form_amount.value)
})

confirm_invoice_btn.addEventListener('click', process_form_data)


