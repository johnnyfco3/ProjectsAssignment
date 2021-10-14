#!/usr/bin/env python
import sys

word = sys.argv[1]
testfile = open("../files/a-web/webanswer.txt", "w")

with open("../files/a-web/tid1input.txt", "r") as input:
    source = False
    input_ = input.read().split(".")
    for i in input_:
        outcome = i.split()
        if word in outcome:
            source = True
            testfile.write(' ' + i + ' ')
    if source == True:
        testfile.write(' -- Source: https://en.wikipedia.org/wiki/List_of_plants_used_in_herbalism -- ')

with open("../files/a-web/tid2input.txt", "r") as input2:
    source2 = False
    input2_ = input2.read().split(".")
    for i2 in input2_:
        outcome2 = i2.split()
        if word in outcome2:
            source2 = True
            testfile.write(' ' + i2 + ' ')
    if source2 == True:
        testfile.write(' -- Source: https://www.wildernesscollege.com/medicinal-plants-list.html -- ') 

with open("../files/a-web/tid3input.txt", "r") as input3:
    source3 = False
    input3_ = input3.read().split(".")
    for i3 in input3_:
        outcome3 = i3.split()
        if word in outcome3:
            source3 = True
            testfile.write(' ' + i3 + ' ')
    if source3 == True:
        testfile.write(' -- Source: https://balconygardenweb.com/best-medicinal-plants/#:~:text=Here -- ') 

with open("../files/a-web/tid4input.txt", "r") as input4:
    source4 = False
    input4_ = input4.read().split(".\n")
    for i4 in input4_:
        outcome4 = i4.split()
        if word in outcome4:
            source4 = True
            testfile.write(' ' + i4 + ' ')
    if source4 == True:
        testfile.write(' -- Source: https://www.urmc.rochester.edu/encyclopedia/content.aspx?contenttypeid=1&contentid=1169 -- ')

with open("../files/a-web/tid5input.txt", "r") as input5:
    source5 = False
    input5_ = input5.read().split(". ")
    for i5 in input5_:
        outcome5 = i5.split()
        if word in outcome5:
            source5 = True
            testfile.write(' ' + i5 + ' ')
    if source5 == True:
        testfile.write(' -- Source: https://www.sciencedirect.com/topics/pharmacology-toxicology-and-pharmaceutical-science/medicinal-plant -- ')

with open("../files/a-web/tid6input.txt", "r") as input6:
    source6 = False
    input6_ = input6.read().split(". ")
    for i6 in input6_:
        outcome6 = i6.split()
        if word in outcome6:
            source6 = True
            testfile.write(' ' + i6 + ' ')
    if source6 == True:
        testfile.write(' -- Source: https://cornellbotanicgardens.org/explore/gardens/medicinal-herbs/ -- ')

with open("../files/a-web/tid7input.txt", "r") as input7:
    source7 = False
    input7_ = input7.read().split(". ")
    for i7 in input7_:
        outcome7 = i7.split()
        if word in outcome7:
            source7 = True
            testfile.write(' ' + i7 + ' ')
    if source7 == True:
        testfile.write(' -- Source: https://www.hindawi.com/journals/prm/2018/7801543/ -- ')

with open("../files/a-web/tid8input.txt", "r") as input8:
    source8 = False
    input8_ = input8.read().split(". ")
    for i8 in input8_:
        outcome8 = i8.split()
        if word in outcome8:
            source8 = True
            testfile.write(' ' + i8 + ' ')
    if source8 == True:
        testfile.write(' -- Source: https://www.ncbi.nlm.nih.gov/pmc/articles/PMC3358962/ -- ')

with open("../files/a-web/tid9input.txt", "r") as input9:
    source9 = False
    input9_ = input9.read().split(". ")
    for i9 in input9_:
        outcome9 = i9.split()
        if word in outcome9:
            source9 = True
            testfile.write(' ' + i9 + ' ')
    if source9 == True:
        testfile.write(' -- Source: https://www.frontiersin.org/articles/10.3389/fphar.2019.01480/full -- ')

testfile.close() 
f = open("../files/a-web/webanswer.txt", "r")
print(f.read())

