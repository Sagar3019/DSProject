class Salpred:
	def sal_exp_pred():
		try:
			print("Loading DataSet...\n")
			from sklearn.model_selection import train_test_split
			import pandas as pd
			import matplotlib.pyplot as plt

			df=pd.read_csv("modl/Salary_Data.csv")
			print("Graph Representation of DataFrame...\n")
			plt.plot(df.YearsExperience,df.Salary)
			plt.title("DataSet Plot")
			plt.xlabel("Years Of Experience")
			plt.ylabel("Salary")
			plt.show()

			print("\nAcquiring Training Data...\n")
			X=df.iloc[:,:-1].values
			Y=df.iloc[:,1].values
			print("Spliting Data for Training And Testing...")
			X_train,X_test = train_test_split(X,test_size=1/3)
			Y_train,Y_test = train_test_split(Y,test_size=1/3)

			print("Training Prediction model using Training data...\n")
			from sklearn.linear_model import LinearRegression
			regressor=LinearRegression()
			for i in range(1,5,1):
				regressor.fit(X_train,Y_train)

			print("Testing Model using Testing Data...\n")
			Y_pred=regressor.predict(X_test)

			print("Test Data result :  \n")
			plt.plot(X_test,Y_pred)
			plt.title("Prediction_Data Plot")
			plt.xlabel("Years Of Experience")
			plt.ylabel("Salary")
			plt.show()

		except ImportError:
			print("Error Importing module !")
