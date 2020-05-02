class imgreg:
	def finimg():
		try:
			import cv2
			import numpy

			face=cv2.CascadeClassifier("D:/project/modl/haarcascade_frontalface_default.xml")

			image=cv2.imread("D:/project/modl/IMG.jpg")
			gray= cv2.cvtColor(image,cv2.COLOR_BGR2GRAY)

			faces = face.detectMultiScale(gray,1.3,5)

			if faces is ():
			    print("no face")
			    
			for(x,y,w,h) in faces:
			    image=cv2.rectangle(image,(x,y),(x+w,y+w),(127,0,205),3)

			cv2.imshow("Face Detection",image)
			cv2.waitKey(0)
			cv2.destroyAllWindows()  
		except ImportError:
			print("Error loading Modules for face recognition module !")  
