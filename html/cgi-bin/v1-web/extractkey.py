#!/usr/bin/env python
import sys
from open import fullfile

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
            break
    for j in input_:
        outcome1 = j.split()
        if word in outcome1:
            fullfile.write(' ' + j + ' \n')
    if source == True:
        fullfile.write('\n -- Source: https://en.wikipedia.org/wiki/List_of_plants_used_in_herbalism -- \n')

with open("../files/a-web/tid2input.txt", "r") as input2:
    source2 = False
    input2_ = input2.read().split(".")
    for i2 in input2_:
        outcome2 = i2.split()
        if word in outcome2:
            source2 = True
            testfile.write(' ' + i2 + ' \n')
            break
    for j2 in input2_:
        outcome10 = j2.split()
        if word in outcome10:
            fullfile.write(' ' + j2 + ' \n')
    if source2 == True:
        fullfile.write('\n -- Source: https://www.wildernesscollege.com/medicinal-plants-list.html -- \n') 

with open("../files/a-web/tid3input.txt", "r") as input3:
    source3 = False
    input3_ = input3.read().split(".")
    for i3 in input3_:
        outcome3 = i3.split()
        if word in outcome3:
            source3 = True
            testfile.write(' ' + i3 + ' \n')
            break
    for j3 in input3_:
        outcome11 = j3.split()
        if word in outcome11:
            fullfile.write(' ' + j3 + ' \n')
    if source3 == True:
        fullfile.write('\n -- Source: https://balconygardenweb.com/best-medicinal-plants/#:~:text=Here -- \n') 

with open("../files/a-web/tid4input.txt", "r") as input4:
    source4 = False
    input4_ = input4.read().split(".")
    for i4 in input4_:
        outcome4 = i4.split()
        if word in outcome4:
            source4 = True
            testfile.write(' ' + i4 + ' \n')
            break
    for j4 in input4_:
        outcome12 = j4.split()
        if word in outcome12:
            fullfile.write(' ' + j4 + ' \n')
    if source4 == True:
        fullfile.write('\n -- Source: https://www.urmc.rochester.edu/encyclopedia/content.aspx?contenttypeid=1&contentid=1169 -- \n')

with open("../files/a-web/tid5input.txt", "r") as input5:
    source5 = False
    input5_ = input5.read().split(".")
    for i5 in input5_:
        outcome5 = i5.split()
        if word in outcome5:
            source5 = True
            testfile.write(' ' + i5 + ' \n')
            break
    for j5 in input5_:
        outcome13 = j5.split()
        if word in outcome13:
            fullfile.write(' ' + j5 + ' \n')
    if source5 == True:
        fullfile.write('\n -- Source: https://www.sciencedirect.com/topics/pharmacology-toxicology-and-pharmaceutical-science/medicinal-plant -- \n')

with open("../files/a-web/tid6input.txt", "r") as input6:
    source6 = False
    input6_ = input6.read().split(".")
    for i6 in input6_:
        outcome6 = i6.split()
        if word in outcome6:
            source6 = True
            testfile.write(' ' + i6 + ' \n')
            break
    for j6 in input6_:
        outcome14 = j6.split()
        if word in outcome14:
            fullfile.write(' ' + j6 + ' \n')
    if source6 == True:
        fullfile.write('\n -- Source: https://cornellbotanicgardens.org/explore/gardens/medicinal-herbs/ -- \n')

with open("../files/a-web/tid7input.txt", "r") as input7:
    source7 = False
    input7_ = input7.read().split(".")
    for i7 in input7_:
        outcome7 = i7.split()
        if word in outcome7:
            source7 = True
            testfile.write(' ' + i7 + ' \n')
            break
    for j7 in input7_:
        outcome15 = j7.split()
        if word in outcome15:
            fullfile.write(' ' + j7 + ' \n')
    if source7 == True:
        fullfile.write('\n -- Source: https://www.hindawi.com/journals/prm/2018/7801543/ -- \n')

with open("../files/a-web/tid8input.txt", "r") as input8:
    source8 = False
    input8_ = input8.read().split(".")
    for i8 in input8_:
        outcome8 = i8.split()
        if word in outcome8:
            source8 = True
            testfile.write(' ' + i8 + ' \n')
            break
    for j8 in input8_:
        outcome16 = j8.split()
        if word in outcome16:
            fullfile.write(' ' + j8 + ' \n')
    if source8 == True:
        fullfile.write('\n -- Source: https://www.ncbi.nlm.nih.gov/pmc/articles/PMC3358962/ -- \n')

with open("../files/a-web/tid9input.txt", "r") as input9:
    source9 = False
    input9_ = input9.read().split(".")
    for i9 in input9_:
        outcome9 = i9.split()
        if word in outcome9:
            source9 = True
            testfile.write(' ' + i9 + ' \n')
            break
    for j9 in input9_:
        outcome17 = j9.split()
        if word in outcome17:
            fullfile.write(' ' + j9 + ' \n')
    if source9 == True:
        fullfile.write('\n -- Source: https://www.frontiersin.org/articles/10.3389/fphar.2019.01480/full -- \n')

with open("../files/a-web/testinput.txt", "r") as input10:
    source10 = False
    input10_ = input10.read().split(".")
    for i10 in input10_:
        outcome10 = i10.split()
        if word in outcome10:
            source10 = True
            testfile.write(' ' + i10 + ' \n')
            break
    for j10 in input10_:
        outcome18 = j10.split()
        if word in outcome18:
            fullfile.write(' ' + j10 + ' \n')
    if source10 == True:
        fullfile.write('\n -- Source: http://cs.newpaltz.edu/p/f21-11/v2/webtest/a1.htm -- \n')

testfile.close()
f = open("../files/a-web/webanswer.txt", "r")
print(f.read())

