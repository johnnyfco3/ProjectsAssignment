with open("html/files/a-web/tid1input.txt", "r") as input:
    input_ = input.read().split(".\n")
    word = "ginger"
    for i in input_:
        outcome = i.split()
        if word in outcome:
            testfile = open("html/files/a-web/webanswer.txt", "w")
            testfile.write(i)
            testfile.close() 


