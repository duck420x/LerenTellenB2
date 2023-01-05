//this would be the object shape for storing the questions  
 //you can change the questions to your own taste or even add more questions..
 const questions = [
    {
        question: "Hoeveel is 5 + 5?",
        optionA: "1",
        optionB: "9",
        optionC: "8",
        optionD: "10",
        correctOption: "optionD"
    },

    {
        question: "Hoeveel is 10 - 5?",
        optionA: "3",
        optionB: "5",
        optionC: "4",
        optionD: "11",
        correctOption: "optionB"
    },

    {
        question: "Wat is meer? 11 + 9 of 21?",
        optionA: "11 + 9",
        optionB: "21",
        optionC: "Geen van beide",
        correctOption: "optionB"
    },

    {
        question: "Larissa loopt voor 20 seconden. Henk loopt 10 seconden langer. Hoeveel seconden loopt Henk?",
        optionA: "10 seconden",
        optionB: "40 seconden",
        optionC: "30 seconden",
        optionD: "20 seconden",
        correctOption: "optionC"
    },

    {
        question: "Hoeveel seconden zitten er in een halve minuut?",
        optionA: "60 seconden",
        optionB: "40 seconden",
        optionC: "50 seconden",
        optionD: "30 seconden",
        correctOption: "optionD"
    },

    {
        question: "5 x 5 = ?",
        optionA: "25",
        optionB: "15",
        optionC: "5",
        optionD: "50",
        correctOption: "optionA"
    },

    {
        question: "50 - 20 = ?",
        optionA: "40",
        optionB: "10",
        optionC: "30",
        optionD: "20",
        correctOption: "optionC"
    },

    {
        question: "5 + 5 = ?",
        optionA: "10",
        optionB: "7",
        optionC: "5",
        optionD: "3",
        correctOption: "optionA"
    },

    {
        question: "Which of these numbers is an odd number ?",
        optionA: "Ten",
        optionB: "Twelve",
        optionC: "Eight",
        optionD: "Eleven",
        correctOption: "optionD"
    },

    {
        question: "7 X 2 = ?",
        optionA: "10",
        optionB: "16",
        optionC: "15",
        optionD: "14",
        correctOption: "optionD"
    },

    {
        question: "10 + 7 = ?",
        optionA: "18",
        optionB: "13",
        optionC: "17",
        optionD: "15",
        correctOption: "optionC"
    },

    {
        question: "8 - 5 = ?",
        optionA: "3",
        optionB: "5",
        optionC: "1",
        optionD: "8",
        correctOption: "optionA"
    },


    {
        question: "2 X 8 = ?",
        optionA: "19",
        optionB: "16",
        optionC: "15",
        optionD: "20",
        correctOption: "optionB"
    },

    {
        question: "50 : 5 = ?",
        optionA: "18",
        optionB: "12",
        optionC: "15",
        optionD: "10",
        correctOption: "optionD"
    },

    {
        question: "6 X 6 = ?",
        optionA: "36",
        optionB: "69",
        optionC: "420",
        optionD: "710",
        correctOption: "optionA"
    },

    {
        question: "9 : 3 = ?",
        optionA: "5",
        optionB: "10",
        optionC: "7",
        optionD: "12",
        correctOption: "optionC"
    },

    {
        question: "10 X 3 = ?",
        optionA: "30",
        optionB: "33",
        optionC: "28",
        optionD: "25",
        correctOption: "optionA"
    },

    {
        question: "6 : 2 = ?",
        optionA: "1",
        optionB: "2",
        optionC: "3",
        optionD: "4",
        correctOption: "optionC"
    },

    {
        question: "69 X 69 = ?",
        optionA: "1738",
        optionB: "710",
        optionC: "69",
        optionD: "420",
        correctOption: "optionD"
    },

    // {
    //     question: "How many sides does an hexagon have ?",
    //     optionA: "Six",
    //     optionB: "Sevene",
    //     optionC: "Four",
    //     optionD: "Five",
    //     correctOption: "optionA"
    // },

    // {
    //     question: "How many planets are currently in the solar system ?",
    //     optionA: "Eleven",
    //     optionB: "Seven",
    //     optionC: "Nine",
    //     optionD: "Eight",
    //     correctOption: "optionD"
    // },

    // {
    //     question: "Which Planet is the hottest ?",
    //     optionA: "Jupitar",
    //     optionB: "Mercury",
    //     optionC: "Earth",
    //     optionD: "Venus",
    //     correctOption: "optionB"
    // },

    // {
    //     question: "where is the smallest bone in human body located?",
    //     optionA: "Toes",
    //     optionB: "Ears",
    //     optionC: "Fingers",
    //     optionD: "Nose",
    //     correctOption: "optionB"
    // },

    // {
    //     question: "How many hearts does an Octopus have ?",
    //     optionA: "One",
    //     optionB: "Two",
    //     optionC: "Three",
    //     optionD: "Four",
    //     correctOption: "optionC"
    // },

    // {
    //     question: "How many teeth does an adult human have ?",
    //     optionA: "28",
    //     optionB: "30",
    //     optionC: "32",
    //     optionD: "36",
    //     correctOption: "optionC"
    // }
]


let shuffledQuestions = [] //empty array to hold shuffled selected questions out of all available questions

function handleQuestions() { 
    //function to shuffle and push 10 questions to shuffledQuestions array
//app would be dealing with 10questions per session
    while (shuffledQuestions.length <= 9) {
        const random = questions[Math.floor(Math.random() * questions.length)]
        if (!shuffledQuestions.includes(random)) {
            shuffledQuestions.push(random)
        }
    }
}


let questionNumber = 1 //holds the current question number
let playerScore = 0  //holds the player score
let wrongAttempt = 0 //amount of wrong answers picked by player
let indexNumber = 0 //will be used in displaying next question

// function for displaying next question in the array to dom
//also handles displaying players and quiz information to dom
function NextQuestion(index) {
    handleQuestions()
    const currentQuestion = shuffledQuestions[index]
    document.getElementById("question-number").innerHTML = questionNumber
    document.getElementById("player-score").innerHTML = playerScore
    document.getElementById("display-question").innerHTML = currentQuestion.question;
    document.getElementById("option-one-label").innerHTML = currentQuestion.optionA;
    document.getElementById("option-two-label").innerHTML = currentQuestion.optionB;
    document.getElementById("option-three-label").innerHTML = currentQuestion.optionC;
    document.getElementById("option-four-label").innerHTML = currentQuestion.optionD;

}


function checkForAnswer() {
    const currentQuestion = shuffledQuestions[indexNumber] //gets current Question 
    const currentQuestionAnswer = currentQuestion.correctOption //gets current Question's answer
    const options = document.getElementsByName("option"); //gets all elements in dom with name of 'option' (in this the radio inputs)
    let correctOption = null

    options.forEach((option) => {
        if (option.value === currentQuestionAnswer) {
            //get's correct's radio input with correct answer
            correctOption = option.labels[0].id
        }
    })

    //checking to make sure a radio input has been checked or an option being chosen
    if (options[0].checked === false && options[1].checked === false && options[2].checked === false && options[3].checked == false) {
        document.getElementById('option-modal').style.display = "flex"
    }

    //checking if checked radio button is same as answer
    options.forEach((option) => {
        if (option.checked === true && option.value === currentQuestionAnswer) {
            document.getElementById(correctOption).style.backgroundColor = "green"
            playerScore++ //adding to player's score
            indexNumber++ //adding 1 to index so has to display next question..
            //set to delay question number till when next question loads
            setTimeout(() => {
                questionNumber++
            }, 1000)
        }

        else if (option.checked && option.value !== currentQuestionAnswer) {
            const wrongLabelId = option.labels[0].id
            document.getElementById(wrongLabelId).style.backgroundColor = "red"
            document.getElementById(correctOption).style.backgroundColor = "green"
            wrongAttempt++ //adds 1 to wrong attempts 
            indexNumber++
            //set to delay question number till when next question loads
            setTimeout(() => {
                questionNumber++
            }, 3500)
        }
    })
}



//called when the next button is called
function handleNextQuestion() {
    checkForAnswer() //check if player picked right or wrong option
    unCheckRadioButtons()
    //delays next question displaying for a second just for some effects so questions don't rush in on player
    setTimeout(() => {
        if (indexNumber <= 9) {
//displays next question as long as index number isn't greater than 9, remember index number starts from 0, so index 9 is question 10
            NextQuestion(indexNumber)
        }
        else {
            handleEndGame()//ends game if index number greater than 9 meaning we're already at the 10th question
        }
        resetOptionBackground()
    }, 1000);
}

//sets options background back to null after display the right/wrong colors
function resetOptionBackground() {
    const options = document.getElementsByName("option");
    options.forEach((option) => {
        document.getElementById(option.labels[0].id).style.backgroundColor = ""
    })
}

// unchecking all radio buttons for next question(can be done with map or foreach loop also)
function unCheckRadioButtons() {
    const options = document.getElementsByName("option");
    for (let i = 0; i < options.length; i++) {
        options[i].checked = false;
    }
}

// function for when all questions being answered
function handleEndGame() {
    let remark = null
    let remarkColor = null

    // condition check for player remark and remark color
    if (playerScore <= 3) {
        remark = "Onvoldoende. Beter oefenen!"
        remarkColor = "red"
    }
    else if (playerScore >= 4 && playerScore < 7) {
        remark = "Matig, ik weet dat je beter kan!"
        remarkColor = "orange"
    }
    else if (playerScore >= 7) {
        remark = "Goed gedaan! Jij bent erg slim!"
        remarkColor = "green"
    }
    const playerGrade = (playerScore / 10) * 100

    //data to display to score board
    document.getElementById('remarks').innerHTML = remark
    document.getElementById('remarks').style.color = remarkColor
    document.getElementById('grade-percentage').innerHTML = playerGrade
    document.getElementById('wrong-answers').innerHTML = wrongAttempt
    document.getElementById('right-answers').innerHTML = playerScore
    document.getElementById('score-modal').style.display = "flex"

}

//closes score modal, resets game and reshuffles questions
function closeScoreModal() {
    questionNumber = 1
    playerScore = 0
    wrongAttempt = 0
    indexNumber = 0
    shuffledQuestions = []
    NextQuestion(indexNumber)
    document.getElementById('score-modal').style.display = "none"
}

//function to close warning modal
function closeOptionModal() {
    document.getElementById('option-modal').style.display = "none"
}