import Input from '../classes/Inputs'

const seePasswordBtn = document.getElementById('seePassword'),
    loginField = document.getElementById('loginPassword')

const seePasswordSignup = document.getElementById('seePasswordSignup'),
    passworSignupField = document.getElementById('signupPassword')


const seeConfirmPasswordSignup = document.getElementById('seeConfirmPasswordSignup'),
    confirmPassworSignupField = document.getElementById('signupConfirmPassword')

Input.showHidePasswor(seePasswordBtn, loginField)
Input.showHidePasswor(seePasswordSignup, passworSignupField)
Input.showHidePasswor(seeConfirmPasswordSignup, confirmPassworSignupField)