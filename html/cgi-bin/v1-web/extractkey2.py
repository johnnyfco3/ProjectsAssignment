#!/usr/bin/env python
import sys
from open import sourcefile

word = sys.argv[1]
testfile = open("../files/a-web/webanswer.txt", "w")

with open("../files/a-web/tid1input.txt", "r") as input:
    source = False
    input_ = input.read().split(".")
    for i in input_:
        outcome = i.split()
        if word in outcome:
            source = True
            testfile.write(' ' + i + ' \n')
    if source == True:
        sourcefile.write('\n https://en.wikipedia.org/wiki/List_of_plants_used_in_herbalism \n')

with open("../files/a-web/tid2input.txt", "r") as input2:
    source2 = False
    input2_ = input2.read().split(".")
    for i2 in input2_:
        outcome2 = i2.split()
        if word in outcome2:
            source2 = True
            testfile.write(' ' + i2 + ' \n')
    if source2 == True:
        sourcefile.write('\n https://www.wildernesscollege.com/medicinal-plants-list.html \n') 

with open("../files/a-web/tid3input.txt", "r") as input3:
    source3 = False
    input3_ = input3.read().split(".")
    for i3 in input3_:
        outcome3 = i3.split()
        if word in outcome3:
            source3 = True
            testfile.write(' ' + i3 + ' \n')
    if source3 == True:
        sourcefile.write('\n https://balconygardenweb.com/best-medicinal-plants/#:~:text=Here \n') 

with open("../files/a-web/tid4input.txt", "r") as input4:
    source4 = False
    input4_ = input4.read().split(".")
    for i4 in input4_:
        outcome4 = i4.split()
        if word in outcome4:
            source4 = True
            testfile.write(' ' + i4 + ' \n')
    if source4 == True:
        sourcefile.write('\n https://www.urmc.rochester.edu/encyclopedia/content.aspx?contenttypeid=1&contentid=1169 \n')

with open("../files/a-web/tid5input.txt", "r") as input5:
    source5 = False
    input5_ = input5.read().split(".")
    for i5 in input5_:
        outcome5 = i5.split()
        if word in outcome5:
            source5 = True
            testfile.write(' ' + i5 + ' \n')
    if source5 == True:
        sourcefile.write('\n https://www.sciencedirect.com/topics/pharmacology-toxicology-and-pharmaceutical-science/medicinal-plant \n')

with open("../files/a-web/tid6input.txt", "r") as input6:
    source6 = False
    input6_ = input6.read().split(".")
    for i6 in input6_:
        outcome6 = i6.split()
        if word in outcome6:
            source6 = True
            testfile.write(' ' + i6 + ' \n')
    if source6 == True:
        sourcefile.write('\n https://cornellbotanicgardens.org/explore/gardens/medicinal-herbs/ \n')

with open("../files/a-web/tid7input.txt", "r") as input7:
    source7 = False
    input7_ = input7.read().split(".")
    for i7 in input7_:
        outcome7 = i7.split()
        if word in outcome7:
            source7 = True
            testfile.write(' ' + i7 + ' \n')
    if source7 == True:
        sourcefile.write('\n https://www.hindawi.com/journals/prm/2018/7801543/ \n')

with open("../files/a-web/tid8input.txt", "r") as input8:
    source8 = False
    input8_ = input8.read().split(".")
    for i8 in input8_:
        outcome8 = i8.split()
        if word in outcome8:
            source8 = True
            testfile.write(' ' + i8 + ' \n')
    if source8 == True:
        sourcefile.write('\n https://www.ncbi.nlm.nih.gov/pmc/articles/PMC3358962/ \n')

with open("../files/a-web/tid9input.txt", "r") as input9:
    source9 = False
    input9_ = input9.read().split(".")
    for i9 in input9_:
        outcome9 = i9.split()
        if word in outcome9:
            source9 = True
            testfile.write(' ' + i9 + ' \n')
    if source9 == True:
        sourcefile.write('\n https://www.frontiersin.org/articles/10.3389/fphar.2019.01480/full \n')

"""with open("../files/a-db/Medicinal-Plant_America.txt", "r" as input10:
    source10 = False
    input10_ = input10.read().split(".")
    for i10 in input10_:
        outcome10 = i10.split()
        if word in outcome10:
            source10 = True
            testfile.write(' ' + i10 + ' \n')
    if source10 == True:
        testfile.write('\n -- PDF: Medicinal Plants of North America -- \n')
        sourcefile.write('\n Medicinal Plants of North America \n')
"""        

testfile.close()
f = open("../files/a-web/webanswer.txt", "r")
print(f.read())