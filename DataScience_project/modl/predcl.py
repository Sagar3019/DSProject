class Iris:
	def iris_class_pred():
		try:
			print("\nImporting Iris DataSet...\n")
			from sklearn import datasets
			from sklearn.neighbors import KNeighborsClassifier as knc
			data=datasets.load_iris()

			print("Acquiring Training Data...\n")
			X=data.data
			Y=data.target

			print("Training Prediction model...\n")
			knn=knc()	
			knn.fit(X,Y)

			while True :
				print("Please input test data : \n")
				sp_len=float(input("Enter Sepal Length : "))
				sp_wid=float(input("Enter Sepal Width : "))
				pt_len=float(input("Enter Petal Length : "))
				pt_wid=float(input("Enter Petal Width : "))
				sample=[[sp_len,sp_wid,pt_len,pt_wid]]

				print("\nPredicting Flower Class...\n")
				pred=knn.predict(sample)

				if pred==[0]:
					print("Flower belong to Class : Iris Setosa")
				elif pred==[1]:
					print("Flower belong to Class : Iris Versicolour")
				elif pred==[2]:
					print("Flower belong to Class : Iris virginica")
				else:
					print("The entered data doesnt not match to any defined Iris Class !")

				con=input("Issue More Predictions ? [Y/N] \nChoice : ")
				if con=='Y' or con=='y':
					pass
				else:
					break
		except ImportError:
			print("Error loading sklearn module !")