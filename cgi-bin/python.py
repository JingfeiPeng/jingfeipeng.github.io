#! /usr/bin/python

print 'Content-type: text/html'
print ''


dict = {}
dict["Jiffer"] = 19
dict['Empress'] = 22
dict['Sexy Girl']=21
dict['nice girl']= 23
for i in dict:
	print i +" is " + str(dict[i])


