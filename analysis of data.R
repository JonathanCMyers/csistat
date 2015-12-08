# 87 in our population, 71 were sampled.
# Of the 70 that were sampled, 6 dropped out of the population.
# Of the 70 in our secondary population (those who were sampled the first time), 38 responded.
# The persuasion for the secondary sample was not as severe as the first sample.

#install.packages("rjson")
library(rjson)
setwd("E:/STA 4370/csistat3")

# Read in all of the data
ID_Ages             <- fromJSON(file="ID_Ages.json", method="C", unexpected.escape="error")
ID_Classifications  <- fromJSON(file="ID_Classifications.json", method="C", unexpected.escape="error")
ID_Genders          <- fromJSON(file="ID_Genders.json", method="C", unexpected.escape="error")
#Answered_Questions  <- fromJSON(file="Answered_Questions.json", method="C", unexpected.escape="error")
Questions_Answers   <- fromJSON(file="Questions_Answers.json", method="C", unexpected.escape="error")
#Answered_Questions2 <- fromJSON(file="Answered_Questions2.json", method="C", unexpected.escape="error")
Questions_Answers2  <- fromJSON(file="Questions_Answers2.json", method="C", unexpected.escape="error")

obs <- length(ID_Ages)
obs2 <- 38

Q_A <- data.frame(#Questions from the first survey
                  id=numeric(obs), q1=character(obs), q2=character(obs), q3=numeric(obs), 
                  q4=character(obs), q5=character(obs), q6=character(obs), q7=character(obs), q8=character(obs), 
                  q9=character(obs), q10=character(obs), q11=character(obs), q12=character(obs), 
                  q13=character(obs), q14=character(obs), q15=character(obs), 
                  
                  # Questions from the second survey that repeat questions from the first survey
                  q5b=character(obs), q6b=character(obs), q7b=character(obs), q10b=character(obs),
                  q11b=character(obs), q12b=character(obs), q13b=character(obs), q14b=character(obs),
                  
                  # New questions from the second survey
                  q6c=character(obs), q10c=character(obs), q11c=character(obs), 
                  q12c=character(obs), q13c=character(obs),
                  
                  stringsAsFactors=FALSE)

currentID <- 0
uniqueID <- 0
for(i in 1:length(Questions_Answers)) {
  # Analysis of the data showed that two results were input twice.
  # Because the text answers for both observations were almost identical, and because the multiple choice
  # answers were the same, we will only consider the first observation and ignore the second.
  if(Questions_Answers[[i]]$id %in% Q_A[, "id"] && Questions_Answers[[i]]$id != currentID) {

  }
  else {
    if(Questions_Answers[[i]]$id != currentID) {
      currentID <- Questions_Answers[[i]]$id
      uniqueID <- uniqueID+1
      Q_A[uniqueID, 1] <- currentID
    }
    currentQuestion <- paste("q", Questions_Answers[[i]]$question_number, sep="")
    if(Questions_Answers[[i]]$question_answer != Q_A[uniqueID, currentQuestion]) {
      Q_A[uniqueID, currentQuestion] <- paste(Q_A[uniqueID, currentQuestion], Questions_Answers[[i]]$question_answer, sep="")
    }
  }
}

# Order the data by ascending ID number
# ID number was included because you need to be able to match to previous responses
Q_A <- Q_A[order(Q_A[,"id"]),]

# Add gender, classification, and ages to the dataframe
for(i in 1:obs) {
  Q_A[i,"q1"] <- ID_Genders[[i]]$gender
  Q_A[i,"q2"] <- ID_Classifications[[i]]$class
  Q_A[i,"q3"] <- ID_Ages[[i]]$age
}

questionPair <- c("q5b", "q6b", "q7b", "q10b", "q11b", "q6c", 
                  "q12b", "q13b", "q14b", "q10c", "q11c", "q12c", "q13c")

currentID <- 0
uniqueID <- 0
secondCount <- 0
answeredSecond <- numeric(obs)
# Go through and put in the answers from the second survey to coordinate with the first
for(i in 1:length(Questions_Answers2)) {
  if(Questions_Answers2[[i]]$id != currentID) {
    currentID <- Questions_Answers2[[i]]$id
    uniqueID <- which(Q_A[,"id"] == currentID)
    secondCount <- secondCount + 1
    answeredSecond[secondCount] <- uniqueID
  }
  currentQuestion <- questionPair[Questions_Answers2[[i]]$question_number]
  if(Questions_Answers2[[i]]$question_answer != Q_A[uniqueID, currentQuestion]) {
    Q_A[uniqueID, currentQuestion] <- paste(Q_A[uniqueID, currentQuestion], Questions_Answers2[[i]]$question_answer, sep="")
  }
}

# Create a dataset of students who switched majors
switchedID <- c(105, 400, 1868, 3097, 4249, 5315, 6553)
numSwitched <- length(switchedID)
switchedIndex <- numeric(numSwitched)
for(i in 1:numSwitched) {
    switchedIndex[i] <- which(Q_A[,"id"] == switchedID[i])
}
switched <- Q_A[switchedIndex,]

# Table of the genders
barplot(table(Q_A[,"q1"]))
# Note - there are only 7 females in the total population, so we have a census of the females 
# in computer science, something that this study will be extrapolated to in later years.

# Table of the classifications
barplot(table(Q_A[,"q2"]))

# Plot of the ages
barplot(table(Q_A[,"q3"]))
table(Q_A[,"q3"])

# q4
# 35.7% of sample has no prior coding experience.
length(Q_A[Q_A[,"q4"] == "e","q4"])/obs

# q8
# 74.3% of sample does not have family members with a career related to computer science.
length(Q_A[Q_A[,"q8"]=="b","q8"])/obs

# 31.4% of sample has no prior coding experience, and no family members with a related career.
length(Q_A[Q_A[,"q8"]=="b" & Q_A[,"q4"]=="e", "q4"])/obs

# q9
# Wide variety of responses
table(Q_A[,"q9"])

# Of the people who switched majors,
# 71.4% of them had no prior coding experience, compared to the 35.7%
# of our total sample.
length(switched[switched[,"q4"] == "e","q4"])/numSwitched

# Of the people who switched majors,
# 71.4% of them did not have family members in a related field to computer
# science, compared to the 74.3% of the original sample.
length(switched[switched[,"q8"] == "b", "q8"])/numSwitched

# The interesting part is that it is the same 71.4%
length(switched[switched[,"q4"] == "e" & switched[,"q8"] == "b", "q4"])/numSwitched

# 27% of the students sampled who remained in computer science
# had no prior programming experience, and had no family members in the field.
notSwitched <- Q_A[-switchedIndex,]
numNotSwitched <- nrow(notSwitched)
length(notSwitched[notSwitched[,"q4"] == "e" 
                   & notSwitched[,"q8"] == "b", "q4"])/numNotSwitched


# There may be something gained from looking at q5 results
# once more data is achieved.
table(Q_A[,"q5"])
table(switched[,"q5"])

# Results for the second survey are more differentiated, 
# but this could be due to having less data.
table(Q_A[,"q5b"])

# The same is true for q6. Very few of the students who switched
# utilized an outside resource for assistance.
table(Q_A[,"q6"])
table(switched[,"q6"])

# The only change between first and second survey is the proportion
# of students who have been to tutoring.
# 10% from first survey as opposed to 42% from second survey.
# Coming from the person who coordinates tutoring, this is GOOD TO SEE.
table(Q_A[,"q6b"])
length(Q_A[Q_A[,"q6"] == "a","q6"])/obs
length(Q_A[Q_A[,"q6b"] == "a","q6b"])/obs2

# Again, there is some bias from these results. Students who are willing
# to take a survey for extra credit (second survey) are probably also 
# more willing to seek out another resource to help increase their grade.

# Those who switched are representative of the population for q7
table(Q_A[,"q7"])
table(switched[,"q7"])

# The overall frequency at which students are seeking help outside
# of class also increases, but the bias is similiar to q6.
table(Q_A[,"q7b"])

table(Q_A[,"q10"])
table(switched[,"q10"])

# Once someone leaves the department, they have no real reason to continue
# taking surveys for that department.
table(Q_A[,"q10b"])
table(switched[,"q10b"])

# Questions 11, 12, 13, and 15 from Survey 1 are mainly used for explanatory analysis.
# For example, the one student who answered e on question 10 gave a lot of description
# about his situation, which we would have not known had we not included those boxes.

# The same is true about question 6 from Survey 2.

# Example responses for how feelings of encouragement / discouragement 
# have changed since the start of the semester.
Q_A[,"q6c"]

# 67% positive responses out of 70 for academic performance. 17% neutral, 16% negative.
length(Q_A[Q_A[,"q14"] == "a","q14"]) + length(Q_A[Q_A[,"q14"] == "b","q14"])
length(Q_A[Q_A[,"q14"] == "c","q14"])
length(Q_A[Q_A[,"q14"] == "d","q14"]) + length(Q_A[Q_A[,"q14"] == "e","q14"])

# 55% positive responses out of 38 for academic performance. 21% neutral, 24% negative.
length(Q_A[Q_A[,"q14b"] == "a","q14b"]) + length(Q_A[Q_A[,"q14b"] == "b","q14b"])
length(Q_A[Q_A[,"q14b"] == "c","q14b"])
length(Q_A[Q_A[,"q14b"] == "d","q14b"]) + length(Q_A[Q_A[,"q14b"] == "e","q14b"])

# Bar plots
barplot(table(Q_A[,"q14"]))
barplot(table(Q_A[Q_A[,"q14b"]!="","q14b"]))
barplot(table(switched[,"q14"]))

# Bimodal responses for how exams have impacted academic confidence, which is expected.
barplot(table(Q_A[Q_A[,"q10c"] != "","q10c"]))

# Better response to practicums than to exams.
barplot(table(Q_A[Q_A[,"q11c"] != "","q11c"]))

# The majority of students () feel prepared for the second course.
barplot(table(Q_A[Q_A[,"q12c"] != "","q12c"]))

# Written exam grades (66.7%), practicums (55.6%), programming assignments (55.6%).
table(Q_A[Q_A[,"q13c"] != "","q13c"])


# Based on the results of this survey, further investigation is needed
# to determine the correlation between careers among family members
# in computer science, those who have no prior computer science experience,
# and retention rate. Other correlations may appear as more data
# becomes available.


