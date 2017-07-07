import java.io.File;
import java.util.LinkedList;
import java.util.Scanner;
import java.util.Stack;

public class Main {
	static VriableAndValue vari[];
	static VriableAndValue equa[];
	static Stack<Object> stack = new Stack<Object>();
	static LinkedList<Object> postfix = new LinkedList<Object>();
	static LinkedList<VriableAndValue> operator = new LinkedList<VriableAndValue>();
	static boolean b = true;

	public static void main(String[] args) {
		readFile();
		setOperatorsValue();
		makePostFix();
	}

	private static void readFile() {
		try {
			File f = new File("input2");
			Scanner k = new Scanner(f);
			while (k.hasNextLine()) {
				int variables = Integer.parseInt(k.nextLine() + "");
				vari = new VriableAndValue[variables];
				for (int c = 0; c < vari.length; c++) {
					vari[c] = new VriableAndValue("", 0);
				}
				int count = 1;
				while (count <= variables) {
					String s = k.nextLine();
					String name = s.substring(0, 1);
					vari[count - 1].name = name;
					int value = Integer.parseInt(s.substring(s.length() - 1));
					vari[count - 1].value = value;
					count++;
				}
				variables = Integer.parseInt(k.nextLine() + "");
				equa = new VriableAndValue[variables];
				for (int c = 0; c < equa.length; c++) {
					equa[c] = new VriableAndValue("");
				}
				count = 1;
				while (count <= variables) {
					String s = k.nextLine();
					equa[count - 1].equation = s;
					count++;
				}
//				for (int c = 0; c < vari.length; c++) {
//					System.out.println(vari[c].name + "=" + vari[c].value);
//				}
//				for (int c = 0; c < equa.length; c++) {
//					System.out.println(equa[c].equation);
//				}
			}
			// calculation();
		} catch (Exception e) {
			System.out.println(e.toString());
		}
	}

	private static void makePostFix() {
//		System.out.println("Postfix:");
		for (int c = 0; c < equa.length; c++) {
			String s = equa[c].equation.toString();
			s = s.replace(" ", "");
			s = s.replace("x", "*");
			for (int i = 0; i < s.length(); i++) {
				String temp = "" + (s.charAt(i));
				if (temp.equals(")")) {
					while (!stack.isEmpty() && !(stack.peek() + "").equals(")")) {
						if (stack.peek().toString().equals("(")) {
							stack.pop();
						} else {
							postfix.add(stack.pop());
						}
					}
				} else if (temp.equals("(")) {
					stack.push("(");
				} else if (tempIsNotOperator(temp)) {
					postfix.add(temp);
				} else {
					// System.err.println(temp+" "+getTheOperatorVlaue(temp));
					if (stack.isEmpty()) {
						stack.push(temp);
					} else {
						operatorStackOperation(temp);
					}
				}
				// System.out.println(stack.toString());
			}
			while (!stack.isEmpty()) {
				postfix.add(stack.pop());
			}
			stack.clear();
//			System.out.println(s);
//			System.out.println(postfix);
			calculateTheAns();
			postfix.clear();
		}
	}

	private static void calculateTheAns() {
		int result = 0;
		Stack<Object> stack = new Stack<Object>();
		try {
			for (int c = 0; c < postfix.size(); c++) {
				String temp = postfix.get(c).toString();
				if (tempIsNotOperator(temp)) {
					stack.push(temp);
				} else {
					if (temp.equals("+")) {
						result = getValue(stack.pop()) + getValue(stack.pop());
						stack.push(result);
					} else if (temp.equals("-")) {
						int num1 = getValue(stack.pop());
						int num2 = getValue(stack.pop());
						result = num2 - num1;
						stack.push(result);

					} else if (temp.equals("*")) {
						int num1 = getValue(stack.pop());
						int num2 = getValue(stack.pop());
						result = num2 * num1 * 1;
						stack.push(result);

					} else if (temp.equals("/")) {
						int num1 = getValue(stack.pop());
						int num2 = getValue(stack.pop());
						result = num2 / num1;
						stack.push(result);
					}
				}
			}
			System.out.println(result);
		} catch (Exception e) {
			System.out.println("Compile error");
		}

	}

	private static void operatorStackOperation(String temp) {
		String oper1 = stack.peek() + "";
		int priorityOper1 = getTheOperatorPriority(oper1);
		int priorityTemp = getTheOperatorPriority(temp);

		if (priorityTemp > priorityOper1) {
			stack.push(temp);
		} else {
			if (priorityTemp == priorityOper1) {
				postfix.add(stack.pop());
				stack.add(temp);
			} else if (priorityTemp < priorityOper1) {
				postfix.add(stack.pop());
				if (!stack.isEmpty()
						&& (priorityTemp < getTheOperatorPriority(stack.peek()
								+ "") || priorityTemp == getTheOperatorPriority(stack
								.peek() + ""))) {
					operatorStackOperation(temp);
				} else
					stack.add(temp);
			}
		}
	}

	private static boolean tempIsNotOperator(String temp) {
		for (int c = 0; c < operator.size(); c++) {
			if ((operator.get(c).operator + "").equals(temp)) {
				return false;
			}
		}
		return true;
	}

	private static int getTheOperatorPriority(String temp) {
		for (int c = 0; c < operator.size(); c++) {
			if ((operator.get(c).operator + "").equals(temp)) {
				return operator.get(c).priority;
			}
		}
		return 0;
	}

	private static void setOperatorsValue() {
		// System.out.println("Operator and priority:");
		operator.add(new VriableAndValue("+", 1, ""));
		operator.add(new VriableAndValue("-", 1, ""));
		operator.add(new VriableAndValue("*", 2, ""));
		operator.add(new VriableAndValue("/", 2, ""));
		// for (int c = 0; c < operator.size(); c++) {
		// System.out.println(operator.get(c).operator + " "
		// + operator.get(c).priority);
		// }
	} 

	private static int getValue(Object variable) {
		variable = variable + "";
		for (int c = 0; c < vari.length; c++) {
			if (vari[c].name.equals(variable)) {
				// System.out.println(vari[c].name + " vari " + vari[c].value);
				return vari[c].value;
			}
		}
		return Integer.parseInt(variable + "");
	}
}
