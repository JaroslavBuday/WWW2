const input = document.querySelector(".filter-input")
const allOneStudents = document.querySelectorAll(".one-student")
const allOneStudentsArray = Array.from(allOneStudents)
const allStudentsDiv = document.querySelector(".all-students")


//students to objects
const studentsObjects = allOneStudentsArray.map((oneStudent, index) => {
    return {
        id: index,
        studentsName: oneStudent.querySelector("h2").textContent,
        studentsLink: oneStudent.querySelector("a")
    }
})

input.addEventListener("input", () => {
    const inputText = input.value.toLowerCase()
    
    const filteredStudents = studentsObjects.filter((oneStudent) => {
        return oneStudent.studentsName.toLowerCase().includes(inputText)

    })

    allStudentsDiv.textContent = ""

    filteredStudents.map((oneFilteredStudent) => {
        const newDiv = document.createElement("div")
        newDiv.classList.add("one-student")

        const newH2 = document.createElement("h2")
        newH2.textContent = oneFilteredStudent.studentsName
        newDiv.append(newH2)

        newDiv.append(oneFilteredStudent.studentsLink)

        allStudentsDiv.append(newDiv)
    })
})