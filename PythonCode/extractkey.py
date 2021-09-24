with open("inputfile.txt", "r") as input:
    input_ = input.read().split(".\n")
    word = "ginger"
    for i in input_:
        outcome = i.split()
        if word in outcome:
            print(i)


