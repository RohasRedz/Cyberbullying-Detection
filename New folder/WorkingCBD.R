# Importing the dataset
dataset_original = read.csv("tbl_comments.csv")

# Cleaning the texts
# install.packages('tm')
# install.packages('SnowballC')
library(tm)
library(SnowballC)

corpus = VCorpus(VectorSource(dataset_original$comment_description))
corpus = tm_map(corpus, content_transformer(tolower))
corpus = tm_map(corpus, removeNumbers)
corpus = tm_map(corpus, removePunctuation)
corpus = tm_map(corpus, removeWords, stopwords('english'))
corpus = tm_map(corpus, stemDocument)
corpus = tm_map(corpus, stripWhitespace)

# Creating the Bag of Words model
dtm = DocumentTermMatrix(corpus)
cbd = as.data.frame(as.matrix(dtm))
cbd$flag <- dataset_original$Flag

grep('flag', colnames(cbd))

#Encoding as Factors
cbd$flag = factor(cbd$flag, levels = c(0, 1))

# Splitting the dataset into the Training set and Test set
# install.packages('caTools')
library(caTools)

set.seed(123)
split = sample.split(cbd$flag, SplitRatio = 0.75)
training_set = subset(cbd, split == TRUE)
test_set = subset(cbd, split == FALSE)

# Scaling Training and Test Sets
#training_set[-36] = scale(training_set[-36])
#test_set[-36] = scale(test_set[-36])

#Random Forest Classifier
library(randomForest)

classifier = randomForest(x = training_set[-36],
                          y = training_set$flag,
                          ntree = 10)

# Predicting the Test set results
y_pred = predict(classifier, newdata = test_set[-36])

# Making the Confusion Matrix
cm = table(test_set[, 36], y_pred)
cm

# Visualising the Training set results
plot(classifier)
text(classifier)