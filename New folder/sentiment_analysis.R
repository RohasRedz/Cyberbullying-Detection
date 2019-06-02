


source("cbdmodel.r", local =TRUE)


#~~~~~~~~~~~~~~~~~~~~~~~~~~ FIRST APPROACH ON SENTIMENT ANALYSIS

# Downloading ranking of words 
# available online http://crr.ugent.be/programs-data/word-ratings
# accessed on 15/04/2018

strFile = 'Ratings_Warriner_et_al.csv'


data_rank = read.csv(strFile)

colnames(data_rank)
head(data_rank[, c('Word', 'V.Mean.Sum', 'A.Mean.Sum', 'D.Mean.Sum')])

library(data.table)
require(stringr)
# by averages: for each row of the original df, take the mean of each numeric measure
# across all words in that tcomment that appear in the valence, arousal and dominance lexicon

#~# REMARK. It is better to use directly the words without processing to avoid wrong transformations. 

#install.packages("data.table", type="source", dependencies=TRUE)

#add if else rohan for na values to delete  that comment
measures <- comments %>% 
  rowwise() %>% 
  do({
    tws <- unlist(str_split(.$comment_description, boundary("word")))
    dplyr::filter(data_rank[,c('Word', 'V.Mean.Sum', 'A.Mean.Sum', 'D.Mean.Sum')], Word %in% tws) %>%
      summarise_all(funs(mean)) %>%
      as.data.table()
  })



codedcomment <- bind_cols(data.table(text = comments$comment_description), measures)
codedcomment[,Word:=NULL]

head(codedcomment[order(V.Mean.Sum, decreasing = T),],10)
head(codedcomment[order(A.Mean.Sum, decreasing = T),],10)
head(codedcomment[order(D.Mean.Sum, decreasing = T),],10)

head(codedcomment[!is.na(V.Mean.Sum),][order(V.Mean.Sum, decreasing = F),],10)
head(codedcomment[!is.na(A.Mean.Sum),][order(A.Mean.Sum, decreasing = F),],10)
head(codedcomment[!is.na(D.Mean.Sum),][order(D.Mean.Sum, decreasing = F),],10)


# install.packages("lexicon")




require(lexicon)
data(dodds_sentiment)

# strFile = 'dodds_sentiment.csv'
# 
# dodds_sentiment = read.csv(strFile)


head(dodds_sentiment[,c('word', 'happiness_average', 'happiness_rank')])

measures <- comments %>% 
  rowwise() %>% 
  do({
    tws <- unlist(str_split(.$comment_description, boundary("word")))
    dplyr::filter(dodds_sentiment[,c('word', 'happiness_rank')], word %in% tws) %>%
      summarise_all(funs(mean)) %>%
      as.data.table()
  })

codedcomment <- bind_cols(data.table(text = comments$comment_description), measures)
codedcomment[,word:=NULL]

head(codedcomment[order(happiness_rank, decreasing = T),],10)
head(codedcomment[!is.na(happiness_rank),][order(happiness_rank, decreasing = F),],10)

data(hash_sentiment_inquirer)
head(hash_sentiment_inquirer)

measures <- comments %>% 
  rowwise() %>% 
  do({
    tws <- unlist(str_split(.$comment_description, boundary("word")))
    dplyr::filter(hash_sentiment_inquirer[,c('x', 'y')], x %in% tws) %>%
      summarise_all(funs(mean)) %>%
      as.data.table()
  })

codedcomment <- bind_cols(data.table(text = comments$comment_description), measures)
codedcomment[,x:=NULL]

head(codedcomment[order(y, decreasing = T),],10)
head(codedcomment[!is.na(y),][order(y, decreasing = F),],10)

# Combine the datasets 
merge_rank <- merge(data_rank[,c('Word', 'V.Mean.Sum', 'A.Mean.Sum', 'D.Mean.Sum')], 
                    dodds_sentiment[,c('word', 'happiness_rank', 'happiness_average')],
                    by.x = 'Word', by.y = 'word', all = T)
merge_rank <- merge(merge_rank, hash_sentiment_inquirer, by.x = 'Word', by.y = 'x', all = T)

tws_filt <-  function (x) {
  tws <- unlist(str_split(x, boundary("word")))
  words <- dplyr::filter(merge_rank, Word %in% tws)
  df <- data.table(txt = x, mean_val = mean(words$V.Mean.Sum, na.rm = T), 
                   sum_val = sum(words$V.Mean.Sum, na.rm = T),
                   mean_dom = mean(words$D.Mean.Sum, na.rm = T), 
                   sum_dom = sum(words$D.Mean.Sum, na.rm = T), 
                   mean_hap = mean(words$happiness_rank, na.rm = T),
                   sum_hap = sum(words$happiness_rank, na.rm = T),
                   mean_hpav = mean(words$happiness_average, na.rm = T), 
                   sum_hpav = sum(words$happiness_average, na.rm = T), 
                   mean_y = mean(words$y, na.rm = T),
                   sum_y = sum(words$y, na.rm = T))
  return(list(df))
  }

ds_means <- as.data.table(tws_filt(comments$comment_description[1]))

for (x in comments$comment_description[2:length(comments$comment_description)]){
  ds_means <- rbind(ds_means, as.data.table(tws_filt(x)))
}

ds_means[,mean_hap:=-mean_hap]
ds_means[,sum_hap:=-sum_hap]


# ds_means[!is.na(mean_y),][order(ds_means[!is.na(mean_y),mean_y]),]
# ds_means[!is.na(sum_y),][order(ds_means[!is.na(sum_y),sum_y]),]
# ds_means[!is.na(sum_val),][order(ds_means[!is.na(sum_val),sum_val]),]
# ds_means[!is.na(sum_hap),][order(ds_means[!is.na(sum_hap),sum_hap], decreasing = T),]
# ds_means[!is.na(mean_val),][order(ds_means[!is.na(mean_val),mean_val]),]


norm_fun <- function (x) {
  sigma <- sd(x, na.rm = T)
  mu <- mean(x, na.rm = T)
  xnorm <- (x - mu) / sigma
  return(xnorm)
}

ds_means_norm <- cbind(ds_means$txt, 
                       apply(ds_means[,2:(ncol(ds_means) - 1), with = F], 2, norm_fun),
                       ds_means$mean_y)

head(ds_means_norm)

mean_tot <-
  unlist(apply(ds_means_norm[,2:ncol(ds_means_norm)], 1, 
                                     function (x) mean(as.numeric(x), na.rm = T)))

ds_means_norm <- as.data.table(ds_means_norm )
ds_means_norm[,mean_tot := mean_tot]

head(ds_means_norm[!is.na(mean_tot),][order(ds_means_norm[!is.na(mean_tot),mean_tot]),],50)


### ELABORATION OF A NON-SUPERVISED ALGORITHM TO FIND TWEETS THAT CAN BE CYBERBULLYING

# We incorporated the sentiment analysis kpi created:
comments$means_tot <- ds_means_norm$mean_tot

# We look at other variables that are valid.

head(sort(table(comments$user_id), decreasing = T))

df$time <- strftime(df$created, format="%H", tz = 'GMT')
comments[!is.na(means_tot),][order(comments[!is.na(means_tot),means_tot])]  

# require(ggplot2)
# 
# df[, replied := ifelse(is.na(replyToSN),0,1)]
# 
# ggplot(data = df) +
#   geom_density(aes(means_tot, fill = factor(replied)), alpha = 0.3)
# 
# ggplot(data = df) +
#   geom_boxplot(aes(x = factor(time), y = means_tot, color = factor(time)
#                ), alpha = 0.3)
# 
# df[retweetCount!= 0,][order(df[retweetCount!= 0,means_tot])]
# 
# length(df[retweetCount > 2,retweetCount])
# quantile(df[,retweetCount], c(0.25,0.5,0.75, 0.9, 0.95))
# 
# df[,rtwct := cut(retweetCount, c(0,3, 8, 15, Inf), include.lowest = T)]
# 
# cor(df[retweetCount < 90 & retweetCount > 2 ,retweetCount], df[retweetCount < 90 & retweetCount > 2  ,means_tot])
# 
# ggplot(data = df) +
#   geom_density(aes(means_tot, fill = factor(rtwct)), alpha = 0.3)
# 
# 
# ggplot(data = df) +
#   geom_point(aes(x = retweetCount,y = means_tot, color = rtwct), alpha = 0.3) +
#   scale_x_log10()
# 
# ##  Asumir que el mean es la única variable que corresponde a un posible cyberbullying
# 
# df_neg <- df[means_tot < -1,]
# 
# head(sort(table(df$replyToSID), decreasing = T))
# 
# df[id %in% replyToSID,]
# 
# ggplot(data = df_neg) +
#   geom_density(aes(replied))
# 
# ggplot(data = df_neg) +
#   geom_density(aes(time), fill = 'blue', alpha = 0.5)
# 
# df[grepl('sex', tweet)]
# df[grepl('fuck', tweet)]
# 
# col=brewer.pal(8, 'Set1')
# 
# text2cloud <- df_neg$tweet
# corp <- Corpus(VectorSource(text2cloud))
# print(wordcloud(corp, max.words=75, random.color=F, 
#                 random.order=F, colors=col))
# 
# # df_neg$text
# 
# 
# df_neg[!is.na(means_tot),][order(df_neg[!is.na(means_tot), means_tot]), c('text', 'means_tot'), with = FALSE]
# 
# df_neg[means_tot %in% sample(df_neg$means_tot, size = 5), c('text', 'means_tot'), with = FALSE]
# 
# df_pos <- df[means_tot >= -1]
# df_pos[means_tot %in% sample(df_pos$means_tot, size = 5), c('text', 'means_tot'), with = FALSE]
# 
# 
# ggplot(data = df) + 
#   geom_density(aes(means_tot), fill = 'turquoise', alpha = 0.7)
# 
