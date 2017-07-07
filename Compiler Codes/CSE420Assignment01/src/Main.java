import java.io.File;
import java.util.LinkedList;
import java.util.Scanner;

public class Main {

	static LinkedList<Object> keywords = new LinkedList<Object>();
	static LinkedList<Object> identifiers = new LinkedList<Object>();
	static LinkedList<Object> math_Operators = new LinkedList<Object>();
	static LinkedList<Object> logical_Operators = new LinkedList<Object>();
	static LinkedList<Object> numerical_Values = new LinkedList<Object>();
	static LinkedList<Object> others = new LinkedList<Object>();

	public static void main(String[] args) {

		try { 
			searchForKeyword();
			printAll("Keywords", keywords);
			searchForIdentifiers();
			printAll("Identifiers", identifiers);
			searchForMathOperators();
			printAll("Math Operators", math_Operators);
			searchForMathLogicalOperators();
			printAll("Logical Operators", logical_Operators);
			searchForMathNumericalValues();
			printAll("Numerical Values", numerical_Values);
			searchForMathLogicalOthers();
			printAll("Others", others);

		} catch (Exception e) {
			System.out.println(e.toString());
		}

	}

	public static void searchForIdentifiers() {
		try {
			File f = new File("input");
			Scanner k = new Scanner(f);
			while (k.hasNextLine()) {
				String s = k.next();
				// System.out.println(s);
				if (s.equals("int") || s.equals("float")) {
					String temp = k.nextLine();
					if (temp.contains("=")) {
						int i = temp.indexOf("=");
						identifiers.add(temp.substring(0, i));
					} else {
						int i = temp.indexOf(";");
						identifiers.add(temp.substring(0, i));
					}
				}
			}
		} catch (Exception e) {

		}
	}

	public static void searchForKeyword() {
		try {
			File f = new File("input");
			Scanner k = new Scanner(f);
			while (k.hasNextLine()) {
				String s = k.nextLine();
				if (s.startsWith("int") && s.contains("int")) {
					s.indexOf("int");
					keywords.add("int");
				}
				if (s.startsWith("float") && s.contains("float")) {
					keywords.add("float");
				}
				if (s.startsWith("else") && s.contains("else")) {
					keywords.add("else");
				}
				if (s.startsWith("if") && s.contains("if")) {
					keywords.add("if");
				}
			}
		} catch (Exception e) {

		}
	}

	public static void searchForMathOperators() {
		try {
			File f = new File("input");
			Scanner k = new Scanner(f);
			while (k.hasNextLine()) {
				String s = k.nextLine();
				if (s.contains("=")) {
					if (math_Operators.contains("=")) {

					} else {
						math_Operators.add("=");
					}
				}
				if (s.contains("+")) {
					if (math_Operators.contains("+")) {

					} else {
						math_Operators.add("+");
					}
				}
				if (s.contains("-")) {
					if (math_Operators.contains("-")) {

					} else {
						math_Operators.add("-");
					}
				}
			}
		} catch (Exception e) {

		}
	}

	public static void searchForMathLogicalOperators() {
		try {
			File f = new File("input");
			Scanner k = new Scanner(f);
			while (k.hasNextLine()) {
				String s = k.nextLine();
				if (s.contains("<")) {
					if (logical_Operators.contains("<")) {

					} else {
						logical_Operators.add("<");
					}
				}
				if (s.contains(">")) {
					if (logical_Operators.contains(">")) {

					} else {
						logical_Operators.add(">");
					}
				}
				if (s.contains("-")) {
					if (math_Operators.contains("-")) {

					} else {
						math_Operators.add("-");
					}
				}
			}
		} catch (Exception e) {

		}
	}

	public static void searchForMathNumericalValues() {
		try {
			File f = new File("input");
			Scanner k = new Scanner(f);
			while (k.hasNext()) {
				String s = k.next();
				int temp;
				double temp2;
				try {
					if (s.endsWith(";")) {
						int i = s.indexOf(";");
						temp = Integer.parseInt(s.substring(0, i));
						numerical_Values.add(temp);
					}
				} catch (Exception e) {
					try {
						int i = s.indexOf(";");
						temp2 = Double.parseDouble(s.substring(0, i));
						numerical_Values.add(temp2);
					} catch (Exception e2) {
					}
				}
			}
		} catch (Exception e) {

		}
	}

	public static void searchForMathLogicalOthers() {
		try {
			File f = new File("input");
			Scanner k = new Scanner(f);
			while (k.hasNextLine()) {
				String s = k.nextLine();
				if (s.contains("(")) {
					if (others.contains("()")) {

					} else {
						others.add("()");
					}
				}
				if (s.contains("{")) {
					if (others.contains("{}")) {

					} else {
						others.add("{}");
					}
				}
				if (s.contains("[")) {
					if (others.contains("[]")) {

					} else {
						others.add("[]");
					}
				}
			}
		} catch (Exception e) {

		}
	}

	public static void printAll(String s, LinkedList<Object> l) {
		System.out.print(s + " : ");
		for (int c = 0; c < l.size(); c++) {
			System.out.print(l.get(c)); 
			if(c==l.size()-1){
				
			}
			else{
				System.out.print(",");
			}
		}
		System.out.println();
	}
}
